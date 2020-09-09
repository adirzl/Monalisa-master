<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLe;
use App\Models\Area;
use App\Models\Relasi\Modelhasroles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class LeController extends Controller
{
    public function index(Request $request){
        if(!in_array(auth()->user()->roles->first()->id, [ env('SUPERADMIN_ID'), env('ADMIN_ID') ])){
            $request->kabkot_id = auth()->user()->kabkot_id;
        }

        $data = User::getUserLe($request);
        $area = to_dropdown(Area::where('type', 2)->orderBy('name', 'asc')->get(), 'id', 'name');
        return view('le.default', compact('data', 'area'));
    }

    public function create(){
        $data = new User();
        $area = to_dropdown(Area::where('type', 2)->orderBy('name', 'asc')->get(), 'id', 'name');
        return view('le.form', compact('data', 'area'));
    }

    public function store(StoreUpdateLe $request){
        $data = new User();
        $values = $request->except('_token', 'save');
        $values['id'] = Uuid::uuid4();
        $values['username'] = 'LE'.$request->kabkot_id;
        $values['password'] = 'p@ssw0rd';
        $values['status'] = 1;

        foreach ($values as $key => $value)
            $data->$key = $value;

        $modelHasRole = new Modelhasroles([
            'role_id' => env('LE_ID'),
            'model_type' => 'App\Models\User',
            'model_id' => $values['id']
        ]);

        $message = ['key' => 'LE', 'value' => $values['username']];
        $status = 'error';
        $response = trans('message.create_failed', $message);

        $saveResult = false;
        DB::transaction(function () use($data, $modelHasRole, &$saveResult) {
            $data->save();
            $modelHasRole->save();

            $saveResult = true;
        });

        if($saveResult){
            $status = 'success';
            $response = trans('message.create_success', $message);
        }

        if ($request->ajax())
            return response()->json(['message' => $response, 'status' => $status]);

        if ($request->only('save'))
            return redirect()->route('le.create')->with($status, $response);

        return redirect('le')->with($status, $response);
    }

    public function show($id){
        $data = User::findOrFail($id);
        return view('le.show', compact('data'));
    }

    public function edit($id){
        $data = User::findOrFail($id);
        $area = to_dropdown(Area::where('type', 2)->orderBy('name', 'asc')->get(), 'id', 'name');
        return view('le.form', compact('data', 'area'));
    }

    public function update(StoreUpdateLe $request, $id){
        $data = User::findOrFail($id);
        $values = $request->except(['_method', '_token', 'save']);

        foreach ($values as $key => $value)
            $data->$key = $value;

        $message = ['key' => 'LE', 'value' => $values['name']];
        $status = 'error';
        $response = trans('message.create_failed', $message);

        if ($data->save()) {
            $status = 'success';
            $response = trans('message.update_success', $message);
        }

        if ($request->ajax())
            return response()->json(['message' => $response, 'status' => $status]);

        return redirect('le')->with($status, $response);
    }

    public function changestatus($id){
        $data = User::findOrFail($id);
        
        $data->status = $data->status == 1 ? 2 : 1;

        $message = ['key' => 'LE', 'value' => $data->username];
        $status = 'error'; $type = 'update';
        $response = trans('message.create_failed', $message);

        if($data->save()){
            $status = 'success';
            $response = trans('message.update_success', $message);
        }

        return redirect('le')->with($status, $response);
    }
}
