<?php

namespace App\Http\Controllers;

use App\Models\Optgroup;
use Illuminate\Http\Request;
use App\Models\Optvalue;

class OptvalueController extends Controller
{
    //
	public function index(Request $request){
		$data = Optvalue::fetch($request);
		$fieldOnGrid = Optvalue::getFieldOnGrid();
		return view('optvalue.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Optvalue;
		$fieldOnForm = Optvalue::getFieldOnForm();
		$opt_group_id = to_dropdown(Optgroup::where('status',1)->get(),'id','name');
		return view('optvalue.form', compact('data','fieldOnForm','opt_group_id'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore(null, new Optvalue(), $values, 'Optvalue');
		return $this->baseRedirect($request, 'optvalue',$result);
	}
	public function show($id){
		$data = Optvalue::findOrFail($id);
		$fieldOnForm = Optvalue::getFieldOnForm();
		return view('optvalue.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Optvalue::findOrFail($id);
		$fieldOnForm = Optvalue::getFieldOnForm();
		return view('optvalue.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Optvalue::findOrFail($id), $values, 'Optvalue');
		return $this->baseRedirect($request, 'optvalue',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Optvalue::findOrFail($id), true);
		return $this->baseRedirect($request, 'optvalue',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(Optvalue::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'optvalue', $result);
	}
}
