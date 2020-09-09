<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    //
	public function index(Request $request){
		$data = Discount::fetch($request);
		$fieldOnGrid = Discount::getFieldOnGrid();
		return view('discount.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Discount;
		$fieldOnForm = Discount::getFieldOnForm();
		return view('discount.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['status'] = 2;
		$result = $this->baseStore($request->_method, new Discount(), $values, $request->name);
		return $this->baseRedirect($request, 'discount.index',$result);
	}
	public function show($id){
		$data = Discount::findOrFail($id);
		$fieldOnForm = Discount::getFieldOnForm();
		return view('discount.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Discount::findOrFail($id);
		$fieldOnForm = Discount::getFieldOnForm();
		return view('discount.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Discount::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'discount.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Discount::findOrFail($id), true);
		return $this->baseRedirect($request, 'discount',$result);
    }
    public function changestatus($id){
        $data = Discount::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        Discount::where('id', '!=', $id)->update(['status' => 2]);
        return $this->baseRedirect(new request(), 'discount',$result);
    }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Discount::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'discount', $result);
	// }
}
