<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detailcart;
use App\Models\Discount;
use App\Models\Price;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class DetailcartController extends Controller
{
    //
	public function index(Request $request){
		$data = Detailcart::fetch($request);
		$fieldOnGrid = Detailcart::getFieldOnGrid();
		return view('detailcart.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Detailcart;
		$fieldOnForm = Detailcart::getFieldOnForm();
		return view('detailcart.form', compact('data','fieldOnForm'));
    }

	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $stock = Stock::GetStock(new Request(['outlet_id' => Auth()->user()->outlet_id, 'product_id' => $request->product_id]));
        $product = Product::findOrFail($request->product_id);

        if(($stock >= $request->qty) || ($product->is_unlimited == true)){
            $currentData = Detailcart::where('user_id', Auth()->user()->id)->where('product_id', $request->product_id)->get();

            if(count($currentData)){
                $values['qty'] = $request->qty;
                $model = $currentData->first();
            }else{
                $values['user_id'] = Auth()->user()->id;
                $values['price'] = Price::where('product_id', $values['product_id'])->first()->price;
                $values['status'] = 1;
                $model = new Detailcart();
            }

            $result = $this->baseStore($request->_method, $model, $values, 'Detailcart');
        }else{
            $message = ['key' => ucwords('order'), 'value' => 'Order'];
            $status = 'error'; $type = 'update';
            $response = trans('message.create_failed', $message);

            $result = ['status' => $status, 'response' => $response];
        }

		return $this->baseRedirect($request, 'order/create',$result);
    }

	public function show($id){
		$data = Detailcart::findOrFail($id);
		$fieldOnForm = Detailcart::getFieldOnForm();
		return view('detailcart.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Detailcart::findOrFail($id);
		$fieldOnForm = Detailcart::getFieldOnForm();
		return view('detailcart.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Detailcart::findOrFail($id), $values, 'Detailcart');
		return $this->baseRedirect($request, 'detailcart.index',$result);
    }

	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Detailcart::findOrFail($id), true);
		return $this->baseRedirect($request, 'detailcart',$result);
    }

	// public function softdelete($id){
	// 	$result = $this->baseStore(Detailcart::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'detailcart', $result);
    // }

    public function emptyByUser(){
        $data = Detailcart::where('user_id', Auth()->user()->id)->delete();
        return response()->json(['data' => $data]);
    }

    public function getCountByUser(){
        $data = Detailcart::where('user_id', Auth()->user()->id)->count();
        return response()->json(['data' => $data]);
    }

    public function getSpecificCart($product_id){
        $data = Detailcart::where('user_id', Auth()->user()->id)->where('product_id', $product_id)->first();
        $result = [
            'id' => $data ? $data->id : null,
            'qty' => $data ? $data->qty : 0
        ];
        return response()->json(['data' => $result]);
    }

    public function getAllCart(){
        return response()->json($this->reloadCart());
    }

    private function reloadCart(){
        $data = Detailcart::select('*')->where('user_id', Auth()->user()->id)->addSelect(DB::raw('(qty * price) as subtotal'))->get();
        $total = $data->sum('subtotal');
        $dataDiscount = Discount::where('status', 1)->first();
        $discount = [
            'percentage' => $dataDiscount ? $dataDiscount->percentage.'%' : '0%',
            'amount' => $dataDiscount ? ($dataDiscount->percentage/100) * $total : 0,
            'amount_label' => 'Rp.'.number_format($dataDiscount ? ($dataDiscount->percentage/100) * $total : 0),
        ];

        $tax = (10/100)*($total-$discount['amount']);
        $grandTotal = $total - $discount['amount'] + $tax;

        $result = [];
        foreach($data as $item){
            $result[] = [
                'name' => $item->product->name,
                'price' => 'Rp.'.number_format($item->price),
                'qty' => $item->qty,
                'subtotal' => 'Rp.'.number_format($item->subtotal)
            ];
        }

        return [
            'data' => $result,
            'total' => 'Rp.'.number_format($total),
            'discount' => $discount,
            'tax' => 'Rp.'.number_format($tax),
            'grandTotal' => 'Rp.'.number_format($grandTotal)
        ];
    }

    public function deleteFromCart(Request $request){
        $product_id = $request->product_id;
        $data = Detailcart::where('user_id', Auth()->user()->id)->where('product_id', $product_id)->first();
        $result = $this->baseDestroy($data, false, 'cart');
        return response()->json($result);
    }

    public function addRemoveCartItem(Request $request){
        $data = Detailcart::where('user_id', Auth()->user()->id)->where('product_id', $request->product_id)->first();
        $stock = Stock::where('outlet_id', Auth()->user()->outlet_id)->where('product_id', $request->product_id)->sum('qty');
        $product = Product::findOrFail($request->product_id);
        $param = intVal($request->state);
        $currentQty = isset($data->qty) ? $data->qty : 0;

        if(($param > 0 && (($stock - $currentQty) > 0 || $product->is_unlimited == true)) || ($param < 0)){
            if($data){
                $qty = $currentQty + $param;
                if($qty == 0){
                    $result = $this->baseDestroy($data);
                }else{
                    $values['qty'] = $qty;
                    $result = $this->baseStore('PUT', $data, $values, 'Detailcart');
                }
            }else if($param > 0){
                $price = Price::where('product_id', $request->product_id)->where('outlet_id', Auth()->user()->outlet_id)->first()->price;;
                if(isset($request->ordertype)){
                    if($request->ordertype == 4){
                        $price = Price::where('product_id', $request->product_id)->where('outlet_id', Auth()->user()->outlet_id)->first()->vendor_price;
                    }
                }
                $model = new Detailcart();
                $values['product_id'] = $request->product_id;
                $values['user_id'] = Auth()->user()->id;
                $values['price'] = $price;
                $values['qty'] = 1;
                $values['status'] = 1;
                $result = $this->baseStore('POST', $model, $values, 'Detailcart');
            }else{
                $message = ['key' => ucwords('order'), 'value' => 'Order'];
                $status = 'error';
                $response = trans('message.null_qty', $message);

                $result = ['status' => $status, 'response' => $response];
            }
        }else{
            $message = ['key' => ucwords('order'), 'value' => 'Order'];
            $status = 'error';
            $response = trans('message.stock_unavailable', $message);

            $result = ['status' => $status, 'response' => $response];
        }
        return $this->baseRedirect($request, 'order/create',$result);
    }
}
