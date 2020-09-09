<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProgres;
use App\Http\Requests\StoreUpdateProject;
use App\Models\Area;
use App\Models\Baseline;
use App\Models\Pelaksana;
use App\Models\Progres;
use Illuminate\Http\Request;
use App\Models\Projects;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Date;
use PDF;
use DateTime;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ProjectsController extends Controller
{
    //
	public function index(Request $request){//dd(env('APP_URL'));
		$data = Projects::fetch($request);
		$fieldOnGrid = Projects::getFieldOnGrid();
		return view('projects.default', compact('data','fieldOnGrid'));
    }

	public function create(){
		$data = new Projects;
        $fieldOnForm = Projects::getFieldOnForm();
        $pelaksana_id = to_dropdown(Pelaksana::where('status', 1)->where('kabkot_id', Auth()->user()->kabkot_id)->get(), 'id', 'name');
        $tipe_konstruksi = to_dropdown(getOptionGroup('tipe_konstruksi'), 'key', 'value');
        $tipe_tangki = to_dropdown(getOptionGroup('tipe_tangki'), 'key', 'value');
        $status_proses = to_dropdown(getOptionGroup('status_proses'), 'key', 'value');
        \Assets::addJs('admin\project.js');
        \Assets::addCss('admin\project.css');
		return view('projects.form', compact('data','fieldOnForm', 'pelaksana_id', 'tipe_konstruksi','tipe_tangki','status_proses'));
    }

    public function fill($id){
        $baseline = Baseline::findOrFail($id);

        if(!$baseline->Project){
            $data = new Projects;
        }else{
            $data = $baseline->Project;
        }

		
        $fieldOnForm = Projects::getFieldOnForm();
        $pelaksana_id = to_dropdown(Pelaksana::where('status', 1)->where('kabkot_id', Auth()->user()->kabkot_id)->get(), 'id', 'name');
        $tipe_konstruksi = to_dropdown(getOptionGroup('tipe_konstruksi'), 'key', 'value');
        $tipe_tangki = to_dropdown(getOptionGroup('tipe_tangki'), 'key', 'value');
        $status_proses = to_dropdown(getOptionGroup('status_proses'), 'key', 'value');
        \Assets::addJs('admin\project_2.js');
        \Assets::addCss('admin\project.css');
		return view('projects.form', compact('data','fieldOnForm', 'pelaksana_id', 'tipe_konstruksi','tipe_tangki','status_proses','baseline'));
    }

	public function store(StoreUpdateProject $request){
	    //$jml_ts_img = $request->file()['jml_ts_img'];
	    //dd(Storage::disk('public_uploads')->put($jml_ts_img->getClientOriginalName(), file_get_contents($request->file()['jml_ts_img'])));
        $values = $request->except('_token', 'save', 'id_baseline_search', 'verified_2_title');
        $values['created_by'] = auth()->user()->id;

        // $jml_ts_img = $request->file()['jml_ts_img'];
        // $jml_ts_50_img = $request->file()['jml_ts_50_img'];
        // $jml_ts_akumulasi_img = $request->file()['jml_ts_akumulasi_img'];

        // $values['jml_ts_img'] = $jml_ts_img->getClientOriginalName();
        // $values['jml_ts_50_img'] = $jml_ts_50_img->getClientOriginalName();
        // $values['jml_ts_akumulasi_img'] = $jml_ts_akumulasi_img->getClientOriginalName();
        // $values['directory_file'] = Carbon::now()->format('dmyhis');
        // dd($values['directory_file'] );
        // $destination = 'public/'.$values['directory_file'];
        // if(!File::exists($destination))
        // {
        //     Storage::makeDirectory($destination);
        // }

        // $jml_ts_img->storeAs($destination, $values['jml_ts_img']);
        // $jml_ts_50_img->storeAs($destination, $values['jml_ts_50_img']);
        // $jml_ts_akumulasi_img->storeAs($destination, $values['jml_ts_akumulasi_img']);
        
        //Storage::disk('public_uploads')->put($values['jml_ts_img'], file_get_contents($jml_ts_img));

		$result = $this->baseStore($request->_method, new Projects(), $values, 'Projects');
		return $this->baseRedirect($request, 'task.index',$result);
    }
    

	public function show($id){
		$data = Projects::findOrFail($id);
        $fieldOnForm = Projects::getFieldOnForm();
        $pelaksana_id = to_dropdown(Pelaksana::where('status', 1)->get(), 'id', 'name');
        $tipe_konstruksi = to_dropdown(getOptionGroup('tipe_konstruksi'), 'key', 'value');
        $tipe_tangki = to_dropdown(getOptionGroup('tipe_tangki'), 'key', 'value');
        $status_proses = to_dropdown(getOptionGroup('status_proses'), 'key', 'value');

        // $contents = Storage::get('public/'.$data->directory_file.'/'.$data->jml_ts_img);dd($contents);

        \Assets::addJs('admin\project_show.js');
        \Assets::addCss('admin\project.css');

		return view('projects.show', compact('data','fieldOnForm','pelaksana_id', 'tipe_konstruksi','tipe_tangki','status_proses'));
	}
	public function edit($id){
		$data = Projects::findOrFail($id);
        $fieldOnForm = Projects::getFieldOnForm();

        $pelaksana_id = to_dropdown(Pelaksana::where('status', 1)->get(), 'id', 'name');
        $tipe_konstruksi = to_dropdown(getOptionGroup('tipe_konstruksi'), 'key', 'value');
        $tipe_tangki = to_dropdown(getOptionGroup('tipe_tangki'), 'key', 'value');
        $status_proses = to_dropdown(getOptionGroup('status_proses'), 'key', 'value');
        \Assets::addJs('admin\project.js');
        \Assets::addCss('admin\project.css');

		return view('projects.form', compact('data','fieldOnForm','pelaksana_id', 'tipe_konstruksi','tipe_tangki','status_proses'));
	}
	public function update(StoreUpdateProject $request, $id){
        $values = $request->except('_token', '_method', 'id_baseline_search', 'verified_2_title');
		$result = $this->baseStore($request->_method, Projects::findOrFail($id), $values, 'Projects');
		return $this->baseRedirect($request, 'task.index',$result);
	}
	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Projects::findOrFail($id), true);
		return $this->baseRedirect($request, 'projects',$result);
	}
	// public function softdelete($id){
	// 	$result = $this->baseStore(Projects::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'projects', $result);
    // }

    public function changestatus($id){
        $data = Projects::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->nama);
        return $this->baseRedirect(new request(), 'projects',$result);
    }
    
    public function cetak_pdf($id)
    {
    	$data = Projects::findOrFail($id);
        $day1 = new DateTime($data->tgl_realisasi_awal);
        $day2 = new DateTime($data->tgl_realisasi_akhir);
        $hari = $day1->diff($day2)->format('%a');
    	$pdf = PDF::loadview('projects.laporan_mingguan_pdf',['data'=>$data],['hari'=>$hari]);
        // return $pdf->download('laporan-mingguan-pdf.pdf');
        return $pdf->stream();
    }

    public function storeprogres(StoreUpdateProgres $request){
        $data = new Progres();

        $values = $request->except('_token', 'save');
        $values['id'] = Uuid::uuid4();
        $values['status'] = isset($request->status) ? 2 : 1;

        $jml_ts_img = $request->file()['jml_ts_img'];
        $values['jml_ts_img'] = $jml_ts_img->getClientOriginalName();
        // $values['directory_file'] = Carbon::now()->format('dmyhis');

        foreach ($values as $key => $value)
            $data->$key = $value;

        $message = ['key' => 'Progres', 'value' => $values['tgl_pelaporan']];
        $status = 'error';
        $response = trans('message.create_failed', $message);

        $saveResult = false;
        DB::transaction(function () use($data, $jml_ts_img, &$saveResult) {  
            $data->save();  

            $baseline = Baseline::findOrFail($data->project->baseline_id);
            $baseline->progres_fisik = $data->status;
            $baseline->save();
            // dd(storage_path('app'));  
            // $destination = 'public/'.$data->directory_file;
            // if(!File::exists($destination))
            // {
            //     Storage::makeDirectory($destination);
            // }
            // $jml_ts_img->storeAs($destination, $data->jml_ts_img);        
            Storage::disk('local')->put($data->jml_ts_img, file_get_contents($jml_ts_img));
            $saveResult = true;
        });


        if($saveResult){
            $status = 'success';
            $response = trans('message.create_success', $message);
        }

        if ($request->ajax())
            return response()->json(['message' => $response, 'status' => $status]);

        // if ($request->only('save'))
        //     return redirect()->route('peoject.create')->with($status, $response);

        return redirect('task')->with($status, $response);
    }

    public function ba_pdf($id){
        $id = '6a5fa5b3-00d0-4fc4-8f5b-626ca9a35bcc';
        $kabkot = Area::findOrFail($id);
        $listKel = Area::getKelFromKabKot($id);

        $listBaseline = Baseline::whereIn('kel_id', $listKel)->get();
        $countBaseline = count($listBaseline);
        $countOversight = $listBaseline->where('pelaksana_id', '!=', null)->count();

        $listIdBaseline = $listBaseline->pluck('id');

        $listProject = Projects::whereIn('baseline_id', $listIdBaseline)->get();

        $q = [];
        $q['1a'] = $listProject->where('tipe_tangki', 1)->count();
        $q['1b'] = $listProject->where('tipe_tangki', 2)->count();

        $q['2a'] = $listProject->where('tipe_konstruksi', 2)->count();
        $q['2b'] = $listProject->where('tipe_konstruksi', 1)->count();

        $pdf = PDF::loadview('projects.ba_0_pdf', compact('kabkot', 'countBaseline', 'countOversight', 'q'));
        return $pdf->stream();
    }
}
