<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detailorder;

class DetailorderController extends Controller
{
    //
	public function index(Request $request){
		$data = Detailorder::fetch($request);
		$fieldOnGrid = Detailorder::getFieldOnGrid();
		return view('detailorder.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Detailorder;
		$fieldOnForm = Detailorder::getFieldOnForm();
		return view('detailorder.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore(new Detailorder(), $values, 'Detailorder');
		return $this->baseRedirect($request, 'detailorder.index',$result);
	}
	public function show($id){
		$data = Detailorder::findOrFail($id);
		$fieldOnForm = Detailorder::getFieldOnForm();
		return view('detailorder.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Detailorder::findOrFail($id);
		$fieldOnForm = Detailorder::getFieldOnForm();
		return view('detailorder.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Detailorder::findOrFail($id), $values, 'Detailorder');
		return $this->baseRedirect($request, 'detailorder.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Detailorder::findOrFail($id), true);
		return $this->baseRedirect($request, 'detailorder',$result);
	}
	// public function softdelete($id){
	// 	$result = $this->baseStore(Detailorder::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'detailorder', $result);
	// }
}
