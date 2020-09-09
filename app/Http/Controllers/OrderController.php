<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Detailcart;
use App\Models\Detailorder;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Facades\PDF as FacadesPDF;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdatePayment;
use App\Models\Province;

class OrderController extends Controller
{
    //
	public function index(Request $request){
        $request->created_at = Carbon::today();
        $data = Order::fetch($request);
        $fieldOnGrid = Order::getFieldOnGrid();
        $user_id = to_dropdown(User::all(), 'id', 'name');
		return view('order.default', compact('data','fieldOnGrid', 'user_id'));
    }

	public function create(){
        $data = new Order;
        $dataCart = new Cart;
        $fieldOnForm = Order::getFieldOnForm();

        $ordertype = to_dropdown(getOptionGroup('ordertype'), 'key', 'value');
        $paymenttype = to_dropdown(getOptionGroup('paymenttype'), 'key', 'value');
        $productList = Product::where('status', 1)->paginate(10);
        $customer_id = to_dropdown(Customer::all(), 'id', 'name');
        $province_id = to_dropdown(Province::get(), 'id', 'name');

        $cart = Detailcart::where('status', 1)->where('user_id', Auth()->user()->id)->get();
        $discount = Discount::where('status', 1)->first();

        \Assets::addJs('admin\order.js');
		return view('order.form', compact('data', 'dataCart','fieldOnForm','ordertype','paymenttype', 'productList','cart', 'customer_id', 'discount', 'province_id'));
    }

	public function store(StoreOrder $request){
        $values = $request->except('_token', 'save');

        $discount = Discount::where('status', 1)->first();

        $values['order_number'] = $this->generateOrderNumber();
        $values['discount_id'] = $discount ? $discount->id : null;
        $values['discount_percentage'] = $discount ? $discount->percentage : null;
        $values['customer_id'] = isset($values['customer_id']) ? $values['customer_id'] : null;
        $values['paymenttype'] = isset($values['paymenttype']) ? $values['paymenttype'] : null;
        $values['payment_number'] = isset($values['payment_number']) ? $values['payment_number'] : null;
        $values['amount_received'] = isset($values['amount_received']) ? $values['amount_received'] : null;
        $values['user_id'] = auth()->user()->id;
        // $values['status'] = 1;

        $detailOrder = [];
        $cart = Detailcart::where('user_id', Auth()->user()->id)->get();
        foreach($cart as $item){
            $detailOrder[] = new Detailorder([
                'id' => Uuid::uuid4(),
                'user_id' => Auth()->user()->id,
                'product_id' => $item->product_id,
                'price' => $item->price,
                'qty' => $item->qty,
                'status' => 1,
            ]);
        }

        $result = $this->baseStore($request->_method, new Order(), $values, 'Order', 'detailorder', $detailOrder);
        if($result['status'] == 'success'){
            foreach($cart as $item){
                if($item->product->is_unlimited == false){
                    $stock = Stock::where('outlet_id', Auth()->user()->outlet_id)->where('product_id', $item->product_id)->get();

                    $tempQty = $item->qty;
                    foreach($stock as $stockItem){
                        if($tempQty <= $stockItem->qty){
                            $stockItem->qty -= $tempQty;
                            $stockItem->save();
                            break;
                        }else{
                            $tempQty -= $stockItem->qty;
                            $stockItem->qty = 0;
                            $stockItem->save();
                        }
                    }
                }
            }
            Detailcart::where('user_id', Auth()->user()->id)->delete();
        }

        if ($request->ajax())
            return response()->json(['message' => $result['response'], 'status' => $result['status'], 'id' => $result['id']]);

        return redirect(route('order.invoice', ['id' => $result['id']]));
		// return $this->baseRedirect($request, 'order.index',$result);
    }

    public function invoice($id){
        $data = Order::findOrFail($id);
        $ordertype = to_dropdown(getOptionGroup('ordertype'), 'key', 'value');
        $paymenttype = to_dropdown(getOptionGroup('paymenttype'), 'key', 'value');

        \Assets::addJs('admin\order.js');
        return view('order.invoice', compact('data', 'ordertype', 'paymenttype'));
    }

	public function show($id){
		$data = Order::findOrFail($id);
		$fieldOnForm = Order::getFieldOnForm();
		return view('order.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Order::findOrFail($id);
        $fieldOnForm = Order::getFieldOnForm();
        $ordertype = to_dropdown(getOptionGroup('order_ordertype'), 'key', 'value');
        $paymenttype = to_dropdown(getOptionGroup('order_paymenttype'), 'key', 'value');
		return view('order.form', compact('data','fieldOnForm','ordertype','paymenttype'));
	}
	public function update(Request $request, $id){dd($request);
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Order::findOrFail($id), $values, 'Order');
		return $this->baseRedirect($request, 'order.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Order::findOrFail($id), true);
		return $this->baseRedirect($request, 'order',$result);
	}
	// public function softdelete($id){
	// 	$result = $this->baseStore(Order::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'order', $result);
    // }

    public function export_bill($id){
        $filename = 'Order-' . now()->format('YmdHis'). '.pdf';
        $data = Order::findOrFail($id);
        $pdf = FacadesPDF::loadView('order.report.bill', compact('data'));
        return $pdf->download($filename);
        // return view('order.report.bill', compact('data'));
    }

    public function preview_bill($id){
        // $filename = 'Order-' . now()->format('YmdHis'). '.pdf';
        $data = Order::findOrFail($id);
        // $pdf = FacadesPDF::loadView('order.report.bill', compact('data'));
        // return $pdf->download($filename);
        // \Assets::addJs('admin\preview_order.js');
        return view('order.report.bill', compact('data'));
    }

    public function pay_bill(UpdatePayment $request){
		$values = $request->except('_token', '_method', 'grandtotal');
		$result = $this->baseStore($request->_method, Order::findOrFail($request->id), $values, 'Order');
		return $this->baseRedirect($request, 'order.index',$result);
    }

    private function generateOrderNumber(){
        $currentDate = Carbon::now()->format('ymdHis');
        $randomNumber = rand(100,999);
        return $currentDate.''.$randomNumber;
    }

}
