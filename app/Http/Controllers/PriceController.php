<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Product;

class PriceController extends Controller
{
    //
	public function index(Request $request){
        $fieldOnGrid = $this->removeBranchFieldFromArray(Price::getFieldOnGrid(), 'outlet_id');
        $request = $this->setDefaultBranchFilter($request);

        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');

        $data = Price::fetch($request);
		return view('price.default', compact('data','fieldOnGrid','outlet_id','product_id'));
    }

	public function create(){
		$data = new Price;
        $fieldOnForm = $this->removeBranchFieldFromArray(Price::getFieldOnForm(), 'outlet_id');

        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');

		return view('price.form', compact('data','fieldOnForm','outlet_id','product_id'));
	}
	public function store(Request $request){
        $request = $this->setDefaultBranchFilter($request);
        $values = $request->except('_token', 'save');
        $values['status'] = 1;
        $roleID = Auth()->user()->roles->first()->id;
        if($roleID == env('ADMIN_ID') || $roleID == env('KASIR_ID')){
            $values['outlet_id'] = Auth()->user()->outlet_id;
        }
		$result = $this->baseStore($request->_method, new Price(), $values, 'Price');
		return $this->baseRedirect($request, 'price.index',$result);
	}
	public function show($id){
		$data = Price::findOrFail($id);
        $fieldOnForm = Price::getFieldOnForm();
        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');
		return view('price.show', compact('data','fieldOnForm','outlet_id','product_id'));
	}
	public function edit($id){
		$data = Price::findOrFail($id);
        $fieldOnForm = Price::getFieldOnForm();
        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');
        // $status = to_dropdown(getOptionGroup('status'), 'key', 'value');
		return view('price.form', compact('data','fieldOnForm','outlet_id','product_id'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Price::findOrFail($id), $values, 'Price');
		return $this->baseRedirect($request, 'price.index',$result);
    }

    public function changestatus($id){
        $data = Price::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'price',$result);
    }
	// public function destroy(Request $request, $id){
	// 	$result = $this->baseDestroy(Price::findOrFail($id), true);
	// 	return $this->baseRedirect($request, 'price',$result);
	// }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Price::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'price', $result);
	// }
}
