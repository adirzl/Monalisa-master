<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOutlet;
use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{

	public function index(Request $request){
		$data = Outlet::fetch($request);
		$fieldOnGrid = Outlet::getFieldOnGrid();
		return view('outlet.default', compact('data','fieldOnGrid'));
    }

	public function create(){
	    $data = new Outlet();
		$fieldOnForm = Outlet::getFieldOnForm();
		return view('outlet.form', compact('data','fieldOnForm'));
    }

	public function store(StoreUpdateOutlet $request){
		$values = $request->except('_token', 'save', 'child', '_method');
		$values['status'] = 1;
		$result = $this->baseStore($request->_method, new Outlet(), $values, $request->name);
		return $this->baseRedirect($request, 'outlet.create',$result);
    }

	public function show($id){
		$data = Outlet::findOrFail($id);
		$fieldOnForm = Outlet::getFieldOnForm();
		return view('outlet.show', compact('data','fieldOnForm'));
    }

	public function edit($id){
		$data = Outlet::findOrFail($id);
		$fieldOnForm = Outlet::getFieldOnForm();
		return view('outlet.form', compact('data','fieldOnForm'));
    }

	public function update(StoreUpdateOutlet $request, $id){
		$values = $request->except('_token', '_method', 'child');
		$result = $this->baseStore($request->_method, Outlet::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'outlet.index',$result);
    }

    public function changestatus($id){
        $data = Outlet::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'outlet',$result);
    }

	// public function destroy(Request $request, $id){
	// 	$result = $this->baseDestroy(Story::findOrFail($id), true);
	// 	return $this->baseRedirect($request, 'story',$result);
    // }

	// public function softdelete($id){
	// 	$result = $this->baseStore(null, Story::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'story', $result);
    // }

}
