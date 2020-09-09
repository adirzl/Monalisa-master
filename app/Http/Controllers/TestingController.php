<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testing;

class TestingController extends Controller
{
    //
	public function index(Request $request){
		$data = Testing::fetch($request);
		$fieldOnGrid = Testing::getFieldOnGrid();
		return view('testing.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Testing;
		$fieldOnForm = Testing::getFieldOnForm();
		return view('testing.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore(new Testing(), $values, 'Testing');
		return $this->baseRedirect($request, 'testing',$result);
	}
	public function show($id){
		$data = Testing::findOrFail($id);
		$fieldOnForm = Testing::getFieldOnForm();
		return view('testing.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Testing::findOrFail($id);
		$fieldOnForm = Testing::getFieldOnForm();
		return view('testing.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Testing::findOrFail($id), $values, 'Testing');
		return $this->baseRedirect($request, 'testing',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Testing::findOrFail($id), true);
		return $this->baseRedirect($request, 'testing',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(Testing::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'testing', $result);
	}
}
