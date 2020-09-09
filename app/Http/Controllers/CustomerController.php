<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Province;

class CustomerController extends Controller
{
    //
	public function index(Request $request){
		$data = Customer::fetch($request);
        $fieldOnGrid = Customer::getFieldOnGrid();
		return view('customer.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Customer;
        $fieldOnForm = Customer::getFieldOnForm();
        $province_id = to_dropdown(Province::get(), 'id', 'name');
		return view('customer.form', compact('data','fieldOnForm','province_id'));
	}
	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['status'] = 1;
		$result = $this->baseStore($request->_method, new Customer(), $values, $request->name);
		return $this->baseRedirect($request, 'customer.index',$result);
	}
	public function show($id){
		$data = Customer::findOrFail($id);
		$fieldOnForm = Customer::getFieldOnForm();
		return view('customer.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Customer::findOrFail($id);
        $fieldOnForm = Customer::getFieldOnForm();
        $province_id = to_dropdown(Province::get(), 'id', 'name');
		return view('customer.form', compact('data','fieldOnForm','province_id'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Customer::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'customer.index',$result);
    }
    public function changestatus($id){
        $data = Customer::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'customer',$result);
    }

    public function getCustomerByName($param){
        $data = Customer::where('name', 'ilike', '%'.$param.'%')->get();
        $result = [];
        foreach($data as $item){
            $result[] = [
                'id' => $item->id,
                'name' => $item->name,
                'phone' => $item->phone,
                'address' => $item->address,
            ];
        }
        return response()->json(['data' => $result]);
    }
	// public function destroy(Request $request, $id){
	// 	$result = $this->baseDestroy(Customer::findOrFail($id), true);
	// 	return $this->baseRedirect($request, 'customer',$result);
	// }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Customer::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'customer', $result);
	// }
}
