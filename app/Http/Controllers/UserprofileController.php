<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userprofile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserprofileController extends Controller
{
    //
	public function index(Request $request){
	    $id = auth()->user()->id;
		$data = Userprofile::findOrFail($id);
		$fieldOnGrid = Userprofile::getFieldOnGrid();
		return view('userprofile.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Userprofile;
		$fieldOnForm = Userprofile::getFieldOnForm();
		return view('userprofile.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore(new Userprofile(), $values, 'Userprofile');
		return $this->baseRedirect($request, 'userprofile.index',$result);
	}
	public function show($id){
		$data = Userprofile::findOrFail($id);
		$fieldOnForm = Userprofile::getFieldOnForm();
		return view('userprofile.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Userprofile::findOrFail($id);
		$fieldOnForm = Userprofile::getFieldOnForm();
		return view('userprofile.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Userprofile::findOrFail($id), $values, 'Userprofile');
		return $this->baseRedirect($request, 'userprofile.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Userprofile::findOrFail($id), true);
		return $this->baseRedirect($request, 'userprofile',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(Userprofile::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'userprofile', $result);
	}
	public function changepassword(Request $request){
	    $data = User::findOrFail(Auth()->user()->id);
	    $data->password = $request->password;
	    $data->save();
	    return redirect('logout');
	}
}
