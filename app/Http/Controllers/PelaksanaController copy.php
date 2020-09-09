<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaksana;
use App\Models\User;

class PelaksanaCopyController extends Controller
{
    //
	public function index(Request $request){
	    $roleId = auth()->user()->roles->first()->id;
	    if($roleId == env('SURVEYOR_ID')){
	        $request->kabkot_id = auth()->user()->kabkot_id;
	    }
		$data = Pelaksana::fetch($request);
		$fieldOnGrid = Pelaksana::getFieldOnGrid();
		return view('pelaksana.default', compact('data','fieldOnGrid'));
    }

	public function create(){
		$data = new Pelaksana;
		$fieldOnForm = Pelaksana::getFieldOnForm();
		//$kabkot_id = to_dropdown(Area::where('type', 2)->get(), 'id', 'name');
		\Assets::addJs('admin\pelaksana.js');
		return view('pelaksana.form', compact('data','fieldOnForm'));
    }

	// public function store(Request $request){
    //     $values = $request->except('_token', 'save');
    //     $values['status'] = 1;
    //     $values['kabkot_id'] = Auth()->user()->kabkot_id;
	// 	$result = $this->baseStore($request->_method, new Pelaksana(), $values, $request->name);
	// 	return $this->baseRedirect($request, 'pelaksana.index',$result);
	// }
	
	public function store(Request $request){
		// $countPelaksana = User::where
        $data = new User();
        $values = $request->except('_token', 'save');
        $values['id'] = Uuid::uuid4();
        $values['username'] = 'pel'.$request->kabkot_id;
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
		$data = Pelaksana::findOrFail($id);
		$fieldOnForm = Pelaksana::getFieldOnForm();
		return view('pelaksana.show', compact('data','fieldOnForm'));
    }

	public function edit($id){
		$data = Pelaksana::findOrFail($id);
		$fieldOnForm = Pelaksana::getFieldOnForm();
		return view('pelaksana.form', compact('data','fieldOnForm'));
    }

	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Pelaksana::findOrFail($id), $values, $request->name);
		return $this->baseRedirect($request, 'pelaksana.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Pelaksana::findOrFail($id), true);
		return $this->baseRedirect($request, 'pelaksana',$result);
    }

	// public function softdelete($id){
	// 	$result = $this->baseStore(Pelaksana::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'pelaksana', $result);
    // }

    public function changestatus($id){
        $data = Pelaksana::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->name);
        // return $this->baseRedirect(new request(), 'pelaksana',$result);
        return redirect('pelaksana')->with($result['status'], $result['response']);
    }

    public function getPelaksana($id){
        $data = Pelaksana::findOrFail($id);
        $result = [];

        if($data){
            $result = [
                'id' => $data->id,
                'name' => $data->name,
                'phone' => $data->phone,
                'spmk_no' => $data->spmk_no,
            ];
        }
        return response()->json(['data' => $result]);
    }
}
