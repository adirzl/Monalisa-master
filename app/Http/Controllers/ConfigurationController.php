<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    //
	public function index(Request $request){
		$data = Configuration::fetch($request);
		$fieldOnGrid = Configuration::getFieldOnGrid();
		return view('configuration.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Configuration;
		$fieldOnForm = Configuration::getFieldOnForm();
		return view('configuration.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore($request->_method, new Configuration(), $values, $request->key);
		return $this->baseRedirect($request, 'configuration',$result);
	}
	public function show($id){
		$data = Configuration::findOrFail($id);
		$fieldOnForm = Configuration::getFieldOnForm();
		return view('configuration.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Configuration::findOrFail($id);
		$fieldOnForm = Configuration::getFieldOnForm();
		return view('configuration.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Configuration::findOrFail($id), $values, $request->key);
		return $this->baseRedirect($request, 'configuration.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Configuration::findOrFail($id), true);
		return $this->baseRedirect($request, 'configuration',$result);
	}
	// public function softdelete($id){
	// 	$result = $this->baseStore(Configuration::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'configuration', $result);
	// }
}
