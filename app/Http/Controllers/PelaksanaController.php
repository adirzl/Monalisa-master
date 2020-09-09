<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePelaksana;
use App\Models\Area;
use App\Models\Baseline;
use App\Models\Configuration;
use Illuminate\Http\Request;
use App\Models\Pelaksana;
use App\Models\Relasi\Modelhasroles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PelaksanaController extends Controller
{
    public function index(Request $request){
        if(in_array(auth()->user()->roles->first()->id, [ env('SUPERADMIN_ID'), env('ADMIN_ID') ])){
            $data = User::fetchPelaksana($request);
        }else{
            $data = User::getUserPelaksana($request);
        }
        $area = to_dropdown(Area::where('type', 2)->orderBy('name', 'asc')->get(), 'id', 'name');
        // \Assets::addJs('admin\pemda.js');
        return view('pelaksana.default', compact('data', 'area'));
    }

    public function create(){
        $data = new User();
        // $area = to_dropdown(Area::where('type', 2)->orderBy('name', 'asc')->get(), 'id', 'name');
        return view('pelaksana.form', compact('data'));
    }

    public function store(StoreUpdatePelaksana $request){
        $countPelaksana = User::getCountPelaksana(new Request);
        $limitPelaksana = Configuration::where('key', env('MAXPELAKSANA_KEY'))->first()->value;

        
        if(($countPelaksana + 1) <= $limitPelaksana){
            $pelUnikId = $countPelaksana + 1;
            $data = new User();
            $values = $request->except('_token', 'save', 'nilai_kontrak', 'spmk_no', 'spmk_date', 'spmk_start_date');
            $values['id'] = Uuid::uuid4();
            $values['kabkot_id'] = auth()->user()->kabkot_id;
            $values['username'] = 'PEL'.$values['kabkot_id'].''.$pelUnikId;
            $values['password'] = 'p@ssw0rd';
            $values['status'] = 1;
            
            foreach ($values as $key => $value)
            $data->$key = $value;
            
            $modelHasRole = new Modelhasroles([
                'role_id' => env('SURVEYOR_ID'),
                'model_type' => 'App\Models\User',
                'model_id' => $values['id']
            ]);
                
            $pelaksana = new Pelaksana([
                'id' => Uuid::uuid4(),
                'nilai_kontrak' => $request->nilai_kontrak,
                'spmk_no' => $request->spmk_no,
                'spmk_date' => $request->spmk_date,
                'spmk_start_date' => $request->spmk_start_date,
                'status' => 1,
                'user_id' => $values['id']
            ]);
                    
            $message = ['key' => 'Pelaksana', 'value' => $values['username']];
            $status = 'error';
            $response = trans('message.create_failed', $message);

            $saveResult = false;
            DB::transaction(function () use($data, $modelHasRole, $pelaksana, &$saveResult) {
                $data->save();
                $modelHasRole->save();
                $pelaksana->save();
    
                $saveResult = true;
            });

            if($saveResult){
                $status = 'success';
                $response = trans('message.create_success', $message);
            }
        }


        if ($request->ajax())
            return response()->json(['message' => $response, 'status' => $status]);

        if ($request->only('save'))
            return redirect()->route('pelaksana.create')->with($status, $response);

        return redirect('pelaksana')->with($status, $response);
    }

    public function show($id){
        $data = User::findOrFail($id);
        return view('pelaksana.show', compact('data'));
    }

    public function edit($id){
        $data = User::findOrFail($id);
        $area = to_dropdown(Area::where('type', 2)->orderBy('name', 'asc')->get(), 'id', 'name');
        return view('pelaksana.form', compact('data', 'area'));
    }

    public function update(StoreUpdatePelaksana $request, $id){
        $data = User::findOrFail($id);
        $values = $request->except(['_method', '_token', 'save', 'nilai_kontrak', 'spmk_no', 'spmk_date', 'spmk_start_date']);

        foreach ($values as $key => $value)
            $data->$key = $value;

        $pelaksana = Pelaksana::where('user_id', $id)->first();
        $pelaksana->nilai_kontrak = $request->nilai_kontrak;
        $pelaksana->spmk_no = $request->spmk_no;
        $pelaksana->spmk_date = $request->spmk_date;
        $pelaksana->spmk_start_date = $request->spmk_start_date;


        $message = ['key' => 'Pelaksana', 'value' => $values['name']];
        $status = 'error';
        $response = trans('message.create_failed', $message);

        $saveResult = false;
        DB::transaction(function () use($data, $pelaksana, &$saveResult) {
            $data->save();
            $pelaksana->save();

            $saveResult = true;
        });

        if ($saveResult) {
            $status = 'success';
            $response = trans('message.update_success', $message);
        }

        if ($request->ajax())
            return response()->json(['message' => $response, 'status' => $status]);

        return redirect('pelaksana')->with($status, $response);
    }

    public function changestatus($id){
        $data = User::findOrFail($id);
        
        $data->status = $data->status == 1 ? 2 : 1;

        $message = ['key' => 'Pelaksana', 'value' => $data->username];
        $status = 'error'; $type = 'update';
        $response = trans('message.create_failed', $message);

        $saveResult = false;
        DB::transaction(function () use($data, &$saveResult){
            $data->save();
            $baseline = Baseline::where('pelaksana_id', $data->id)->get();

            foreach($baseline as $item){
                $item->pelaksana_id = null;
                $item->save();
            }

            $saveResult = true;
        });

        if($saveResult){
            $status = 'success';
            $response = trans('message.update_success', $message);
        }

        return redirect('pelaksana')->with($status, $response);
    }

    public function assigntask($id){
        $data = User::findOrFail($id);
        // $req = new Request();
        // $req->
        $tempArea = Area::where('id', auth()->user()->kabkot_id)->first();
        $kelList = Area::getKelFromKabKot($tempArea->code);
        $baselines = Baseline::whereIn('kel_id', $kelList)->where('pelaksana_id', null)->orderBy('nama', 'ASC')->get();
        return view('pelaksana.assigntask', compact('data', 'baselines'));
    }

    public function storetask(Request $request){
        $user = User::findOrFail($request->pelaksana_id);
        $listBaseline = $request->only('baseline_id');
        $result = DB::table('baselines')->whereIn('id', $listBaseline['baseline_id'])->update([ 'pelaksana_id' => $request->pelaksana_id ]);

        $message = ['key' => 'Pelaksana', 'value' => $user->name];
        $status = 'error'; $type = 'update';
        $response = trans('message.create_failed', $message);

        if($result){
            $status = 'success';
            $response = trans('message.update_success', $message);
        }
        return redirect('pelaksana')->with($status, $response);
    }

    public function updatetask(Request $request, $id){
        dd($id);
    }
}
