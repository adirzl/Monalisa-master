<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Optgroup;

class OptgroupController extends Controller
{
    //
	public function index(Request $request){
		$data = Optgroup::fetch($request);
		$fieldOnGrid = Optgroup::getFieldOnGrid();
		return view('optgroup.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Optgroup;
		$fieldOnForm = Optgroup::getFieldOnForm();
		return view('optgroup.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore(null, new Optgroup(), $values, 'Optgroup');
		return $this->baseRedirect($request, 'optgroup',$result);
	}
	public function show($id){
		$data = Optgroup::findOrFail($id);
		$fieldOnForm = Optgroup::getFieldOnForm();
		return view('optgroup.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Optgroup::findOrFail($id);
		$fieldOnForm = Optgroup::getFieldOnForm();
		return view('optgroup.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Optgroup::findOrFail($id), $values, 'Optgroup');
		return $this->baseRedirect($request, 'optgroup',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Optgroup::findOrFail($id), true);
		return $this->baseRedirect($request, 'optgroup',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(Optgroup::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'optgroup', $result);
	}
}
