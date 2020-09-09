<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowReport;
use App\Models\Area;
use App\Models\Baseline;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use PDF;


class ReportController extends Controller
{
    //
	public function index(Request $request){
        if(in_array(auth()->user()->roles->first()->id, [ env('ADMIN_ID') ])){
            $kabkot = to_dropdown(Area::where('type', 2)->orderBy('name','ASC')->get(), 'code', 'name');
        }else{
            $kabkot = to_dropdown(Area::where('id', auth()->user()->kabkot_id)->orderBy('name','ASC')->get(), 'code', 'name', false);
        }

		return view('report.default', compact('kabkot'));
    }

    public function export_ba(ShowReport $request){
        $kabkot = Area::findOrFail($request->kabkot_id);
        $listKel = Area::getKelFromKabKot($request->kabkot_id);

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

        if($request->type == 1){
            $pdf = PDF::loadview('projects.ba_0_pdf', compact('kabkot', 'countBaseline', 'countOversight', 'q'));
        }else if($request->type == 2){
            $pdf = PDF::loadview('projects.ba_50_pdf', compact('kabkot', 'countBaseline', 'countOversight', 'q'));
        }else{
            $pdf = PDF::loadview('projects.ba_100_pdf', compact('kabkot', 'countBaseline', 'countOversight', 'q'));
        }
        return $pdf->stream();
    }

}
