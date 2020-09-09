<?php

namespace App\Http\Controllers;

use App\Models\Detailcart;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
	public function index(Request $request){
		$data = Product::fetch($request);
        $fieldOnGrid = Product::getFieldOnGrid();
        $category_id = to_dropdown(getOptionGroup('product_category'), 'key', 'value');
        $unit_id = to_dropdown(getOptionGroup('product_unit'), 'key', 'value');
		return view('product.default', compact('data','fieldOnGrid','category_id','unit_id'));
	}
	public function create(){
		$data = new Product;
        $fieldOnForm = Product::getFieldOnForm();
        $category_id = to_dropdown(getOptionGroup('product_category'), 'key', 'value');
        $unit_id = to_dropdown(getOptionGroup('product_unit'), 'key', 'value');
		return view('product.form', compact('data','fieldOnForm','category_id','unit_id'));
	}
	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['status'] = 1;
		$result = $this->baseStore($request->_method, new Product(), $values, $request->name);
		return $this->baseRedirect($request, 'product.index',$result);
	}
	public function show($id){
		$data = Product::findOrFail($id);
		$fieldOnForm = Product::getFieldOnForm();
		return view('product.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Product::findOrFail($id);
        $fieldOnForm = Product::getFieldOnForm();
        $category_id = to_dropdown(getOptionGroup('product_category'), 'key', 'value');
        $unit_id = to_dropdown(getOptionGroup('product_unit'), 'key', 'value');
		return view('product.form', compact('data','fieldOnForm','category_id','unit_id'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Product::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'product.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Product::findOrFail($id), true);
		return $this->baseRedirect($request, 'product',$result);
    }

    public function changestatus($id){
        $data = Product::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'product',$result);
    }

	// public function softdelete($id){
	// 	$result = $this->baseStore(Product::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'product', $result);
    // }

    public function getDetailAjx($id)
    {
        $data = Product::findOrFail($id);
        $result = [
            'id' => $data->id,
            'name' => $data->name,
            'category' => config('options.product_category')[$data->category_id],
            'price' => 'Rp.'.number_format($data->price->first()->price ? $data->price->first()->price : 0),
            'stock' => $data->is_unlimited ? '~' : $data->stock->sum('qty'),
            'unit' => $data->is_unlimited ? '' : config('options.product_unit')[$data->unit_id],
        ];
        return response()->json(['data' => $result]);
    }

    public function getProductListByParam($param){
        if($param != 'null'){
            $data = Product::where('name', 'ilike', $param.'%')
                ->orWhere('name', 'ilike', '%'.$param.'%')
                ->orWhere('name', 'ilike', '%'.$param)
                ->get();
        }else{
            $data = Product::all();
        }


        $result = [];
        foreach($data as $item){
            $itemInCart = $item->detailcart->sum('qty');
            $result[] = [
                'qty' => $item->detailcart->where('product_id', $item->id)->sum('qty').'x',
                'id' => $item->id,
                'name' => $item->name,
                'price' => 'Rp.'.number_format($item->price->first()->price),
                'vendor_price' => 'Rp.'.number_format($item->price->first()->vendor_price),
                'stock' => $item->is_unlimited ? '~' : $item->stock->sum('qty') - $itemInCart.' '.config('options.product_unit')[$item->unit_id],
                'category' => config('options.product_category')[$item->category_id],
                'is_unlimited' => $item->is_unlimited
                // 'stock' => $item->stock->sum('qty').' '.getOptionGroup('product_unit')->where('key', $item->unit_id)->first()->value
            ];
        }
        return response()->json(['data' => $result]);
    }
}
