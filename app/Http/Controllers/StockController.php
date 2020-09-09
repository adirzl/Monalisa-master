<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    //
	public function index(Request $request){
        $fieldOnGrid = $this->removeBranchFieldFromArray(Stock::getFieldOnGrid(), 'outlet_id');
        $request = $this->setDefaultBranchFilter($request);

        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');

        $data = Stock::fetch($request);
		return view('stock.default', compact('data','fieldOnGrid', 'product_id', 'outlet_id'));
    }

	public function create(){
		$data = new Stock;
        $fieldOnForm = $this->removeBranchFieldFromArray(Stock::getFieldOnForm(), 'outlet_id');

        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');
		return view('stock.form', compact('data','fieldOnForm', 'product_id', 'outlet_id'));
    }

	public function store(Request $request){
        $request = $this->setDefaultBranchFilter($request);
        $values = $request->except('_token', 'save');
        $values['purchase_qty'] = $values['qty'];
        $values['status'] = 1;

        // $roleID = Auth()->user()->roles->first()->id;
        // if($roleID == env('ADMIN_ID') || $roleID == env('KASIR_ID')){
        //     $values['outlet_id'] = Auth()->user()->outlet_id;
        // }

		$result = $this->baseStore($request->_method, new Stock(), $values, 'Stock');
		return $this->baseRedirect($request, 'stock.index',$result);
    }

	public function show($id){
        $data = Stock::findOrFail($id);
        $data->purchase_price = 'Rp.'.number_format($data->purchase_price);
		$fieldOnForm = Stock::getFieldOnForm();
		return view('stock.show', compact('data','fieldOnForm'));
    }

	public function edit($id){
		$data = Stock::findOrFail($id);
        $fieldOnForm = Stock::getFieldOnForm();
        $outlet_id = to_dropdown(Outlet::get(), 'id', 'name');
        $product_id = to_dropdown(Product::get(), 'id', 'name');
		return view('stock.form', compact('data','fieldOnForm', 'product_id', 'outlet_id'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Stock::findOrFail($id), $values, 'Stock');
		return $this->baseRedirect($request, 'stock.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Stock::findOrFail($id), true);
		return $this->baseRedirect($request, 'stock',$result);
    }

    public function changestatus($id){
        $data = Stock::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'stock',$result);
    }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Stock::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'stock', $result);
	// }
}
