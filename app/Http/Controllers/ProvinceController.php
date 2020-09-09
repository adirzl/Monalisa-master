<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    //
	public function index(Request $request){
		$data = Province::fetch($request);
		$fieldOnGrid = Province::getFieldOnGrid();
		return view('province.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Province;
		$fieldOnForm = Province::getFieldOnForm();
		return view('province.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore($request->_method, new Province(), $values, $request->name);
		return $this->baseRedirect($request, 'province.index',$result);
	}
	public function show($id){
		$data = Province::findOrFail($id);
		$fieldOnForm = Province::getFieldOnForm();
		return view('province.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Province::findOrFail($id);
		$fieldOnForm = Province::getFieldOnForm();
		return view('province.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Province::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'province.index',$result);
    }

    public function changestatus($id){
        $data = Province::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'province',$result);
    }
	// public function destroy(Request $request, $id){
	// 	$result = $this->baseDestroy(Province::findOrFail($id), true);
	// 	return $this->baseRedirect($request, 'province',$result);
	// }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Province::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'province', $result);
	// }
}
