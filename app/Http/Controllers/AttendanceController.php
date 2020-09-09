<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAttendance;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    //
	public function index(Request $request){
        $request->user_id = auth()->user()->id;
		$data = Attendance::fetch($request);
		$fieldOnGrid = Attendance::getFieldOnGrid();
		return view('attendance.default', compact('data','fieldOnGrid'));
	}
	public function create(){
		$data = new Attendance;
		$fieldOnForm = Attendance::getFieldOnForm();
		return view('attendance.form', compact('data','fieldOnForm'));
	}
	public function store(StoreUpdateAttendance $request){
        $values = $request->except('_token', 'save');
        $values['user_id'] = auth()->user()->id;
		$values['status'] = 1;
		$result = $this->baseStore('save', new Attendance(), $values, 'Attendance');
		return $this->baseRedirect($request, 'attendance',$result);
	}
	public function show($id){
		$data = Attendance::findOrFail($id);
		$fieldOnForm = Attendance::getFieldOnForm();
		return view('attendance.show', compact('data','fieldOnForm'));
	}
	public function edit($id){
		$data = Attendance::findOrFail($id);
		$fieldOnForm = Attendance::getFieldOnForm();
		return view('attendance.form', compact('data','fieldOnForm'));
	}
	public function update(StoreUpdateAttendance $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore('update', Attendance::findOrFail($id), $values, 'Attendance');
		return $this->baseRedirect($request, 'attendance',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Attendance::findOrFail($id), true);
		return $this->baseRedirect($request, 'attendance',$result);
	}
	public function softdelete($id){
		$result = $this->baseStore(null, Attendance::findOrFail($id), ['deleted_at' => Carbon::now()]);
		return $this->baseRedirect(new Request(), 'attendance', $result);
	}
}
