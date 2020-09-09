<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekspedisi;

class EkspedisiController extends Controller
{
    //
	public function index(Request $request){
		$data = Ekspedisi::fetch($request);
		$fieldOnGrid = Ekspedisi::getFieldOnGrid();
		return view('ekspedisi.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Ekspedisi;
		$fieldOnForm = Ekspedisi::getFieldOnForm();
		return view('ekspedisi.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['status'] = 1;
		$result = $this->baseStore($request->_method, new Ekspedisi(), $values, $request->name);
		return $this->baseRedirect($request, 'ekspedisi.index',$result);
	}
	public function show($id){
		$data = Ekspedisi::findOrFail($id);
		$fieldOnForm = Ekspedisi::getFieldOnForm();
		return view('ekspedisi.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Ekspedisi::findOrFail($id);
		$fieldOnForm = Ekspedisi::getFieldOnForm();
		return view('ekspedisi.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Ekspedisi::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'ekspedisi.index',$result);
    }

    public function changestatus($id){
        $data = Ekspedisi::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'ekspedisi',$result);
    }
	// public function destroy(Request $request, $id){
	// 	$result = $this->baseDestroy(Ekspedisi::findOrFail($id), true);
	// 	return $this->baseRedirect($request, 'ekspedisi',$result);
	// }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Ekspedisi::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'ekspedisi', $result);
	// }
}
