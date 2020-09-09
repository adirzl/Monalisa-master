<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    //
	public function index(Request $request){
		$data = Shipment::fetch($request);
        $fieldOnGrid = Shipment::getFieldOnGrid();
        $order_id = to_dropdown(Order::all(), 'id', 'created_at');
        $ekspedisi_id = to_dropdown(Ekspedisi::all(), 'id', 'name');
		return view('shipment.default', compact('data','fieldOnGrid','order_id','ekspedisi_id'));
	}
	public function create(){
		$data = new Shipment;
        $fieldOnForm = Shipment::getFieldOnForm();
        $order_id = to_dropdown(Order::all(), 'id', 'created_at');
        $ekspedisi_id = to_dropdown(Ekspedisi::all(), 'id', 'name');
		return view('shipment.form', compact('data','fieldOnForm','order_id','ekspedisi_id'));
	}
	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['user_id'] = Auth()->user()->id;
        $values['status'] = 1;
		$result = $this->baseStore($request->_method, new Shipment(), $values, 'Shipment');
		return $this->baseRedirect($request, 'shipment.index',$result);
	}
	public function show($id){
		$data = Shipment::findOrFail($id);
		$fieldOnForm = Shipment::getFieldOnForm();
		return view('shipment.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Shipment::findOrFail($id);
        $fieldOnForm = Shipment::getFieldOnForm();
        $order_id = to_dropdown(Order::all(), 'id', 'created_at');
        $ekspedisi_id = to_dropdown(Ekspedisi::all(), 'id', 'name');
		return view('shipment.form', compact('data','fieldOnForm','order_id','ekspedisi_id'));
	}
	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Shipment::findOrFail($id), $values, 'Shipment');
		return $this->baseRedirect($request, 'shipment.index',$result);
    }

    public function changestatus($id){
        $data = Shipment::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        return $this->baseRedirect(new request(), 'shipment',$result);
    }

	// public function destroy(Request $request, $id){
	// 	$result = $this->baseDestroy(Shipment::findOrFail($id), true);
	// 	return $this->baseRedirect($request, 'shipment',$result);
	// }
	// public function softdelete($id){
	// 	$result = $this->baseStore(Shipment::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'shipment', $result);
	// }
}
