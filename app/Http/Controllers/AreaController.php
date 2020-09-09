<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    //
	public function index(Request $request){
		$data = Area::fetch($request);
		$fieldOnGrid = Area::getFieldOnGrid();
		return view('area.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Area;
		$fieldOnForm = Area::getFieldOnForm();
		return view('area.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['status'] = 1;
		$result = $this->baseStore($request->_method, new Area(), $values, 'Area');
		return $this->baseRedirect($request, 'area.index',$result);
	}
	public function show($id){
		$data = Area::findOrFail($id);
		$fieldOnForm = Area::getFieldOnForm();
		return view('area.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Area::findOrFail($id);
		$fieldOnForm = Area::getFieldOnForm();
		return view('area.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Area::findOrFail($id), $values, 'Area');
		return $this->baseRedirect($request, 'area.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Area::findOrFail($id), true);
		return $this->baseRedirect($request, 'area',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(Area::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'area', $result);
	}
}
