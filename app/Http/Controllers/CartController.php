<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    //
	public function index(Request $request){
		$data = Cart::fetch($request);
		$fieldOnGrid = Cart::getFieldOnGrid();
		return view('cart.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Cart;
		$fieldOnForm = Cart::getFieldOnForm();
		return view('cart.form', compact('data','fieldOnForm'));
	}
	public function store(Request $request){
		$values = $request->except('_token', 'save');
		$result = $this->baseStore(new Cart(), $values, 'Cart');
		return $this->baseRedirect($request, 'cart.index',$result);
	}
	public function show($id){
		$data = Cart::findOrFail($id);
		$fieldOnForm = Cart::getFieldOnForm();
		return view('cart.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Cart::findOrFail($id);
		$fieldOnForm = Cart::getFieldOnForm();
		return view('cart.form', compact('data','fieldOnForm'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore(Cart::findOrFail($id), $values, 'Cart');
		return $this->baseRedirect($request, 'cart.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Cart::findOrFail($id), true);
		return $this->baseRedirect($request, 'cart',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(Cart::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'cart', $result);
	}
}
