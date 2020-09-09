<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baseline;
use App\Exports\ExportRAW;
use App\Imports\UploadRAW;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BaselineController extends Controller
{
    //
	public function index(Request $request){
	    $roleId = auth()->user()->roles->first()->id;
	    if(in_array($roleId, [ env('LE_ID'), env('PEMDA_ID'), env('SURVEYOR_ID') ])){
	        $request->kabkot_id = auth()->user()->kabkot_id;
	    }
	    
		$data = Baseline::fetch($request);
		$fieldOnGrid = Baseline::getFieldOnGrid();
		return view('baseline.default', compact('data','fieldOnGrid'));
    }

	public function create(){
		$data = new Baseline;
		$fieldOnForm = Baseline::getFieldOnForm();
		return view('baseline.form', compact('data','fieldOnForm'));
    }

	public function store(Request $request){
        $values = $request->except('_token', 'save');
        $values['status'] = 1;
		$result = $this->baseStore($request->_method, new Baseline(), $values, $request->nama);
		return $this->baseRedirect($request, 'baseline.index',$result);
    }

	public function show($id){
		$data = Baseline::findOrFail($id);
		$fieldOnForm = Baseline::getFieldOnForm();
		return view('baseline.show', compact('data','fieldOnForm'));
    }

	public function edit($id){
		$data = Baseline::findOrFail($id);
		$fieldOnForm = Baseline::getFieldOnForm();
		return view('baseline.form', compact('data','fieldOnForm'));
    }

	public function update(Request $request, $id){
		$values = $request->except('_token', '_method');
		$result = $this->baseStore($request->_method, Baseline::findOrFail($id), $values, $request->nama);
		return $this->baseRedirect($request, 'baseline.index',$result);
    }

	public function destroy(Request $request, $id){
		$result = $this->baseDestroy(Baseline::findOrFail($id), true);
		return $this->baseRedirect($request, 'baseline',$result);
	}
	// public function softdelete($id){
	// 	$result = $this->baseStore(Baseline::findOrFail($id), ['deleted_at' => Carbon::now()]);
	// 	return $this->baseRedirect(new Request(), 'baseline', $result);
    // }

    public function changestatus($id){
        $data = Baseline::findOrFail($id);
        $result = $this->baseChangeStatus($data, $data->nama);
        return $this->baseRedirect(new request(), 'baseline',$result);
    }

    public function getBaseline($id){
        $data = Baseline::findOrFail($id);
        $kabkot_user = Auth()->user()->kabkot_id;
        $kabkot_baseline = $data->Area->parent_area->parent_area->id;
//dd($kabkot_user.'='.$kabkot_baseline);
        $result = [];

        if($data && ($kabkot_baseline == $kabkot_user)){
            $result = [
                'id' => $data->id,
                'nama' => $data->nama,
                'alamat' => $data->alamat,
                'kec' => $data->kec,
                'kel' => $data->kel,
            ];
        }
        return response()->json(['data' => $result]);
    }
    
    public function getBaselinePartial(){
        $listKec = Auth()->user()->area->child_area;

        $kelItem = [];
        foreach($listKec as $kec){
            $listKel = $kec->child_area;
            foreach($listKel as $kel){
                $kelItem[] = $kel->id;
            }
        }

        $data = Baseline::select(DB::raw("CONCAT(id, ' | ', nama) as fullname, nama"))->whereIn('kel_id', $kelItem)->pluck('nama', 'fullname');

        foreach($data as $key => $value){
            $data[$key] = null;
        }
        return response()->json(['data' => $data]);
    }
    
    public function export_excel()
    {
        return Excel::download(new ExportRAW, 'ExportRAW.xlsx');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();
        
        $destination = 'public/baselineupload';
        if(!File::exists($destination))
        {
            Storage::makeDirectory($destination);
        }

        // upload ke folder file di dalam folder public
        $file->storeAs($destination, $nama_file);

        // import data
        Excel::import(new UploadRAW(auth()->user()->kabkot_id), storage_path('/app/public/baselineupload/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Baselines Berhasil Diupload!');

        // alihkan halaman kembali
        return redirect('/baseline');
    }
}
