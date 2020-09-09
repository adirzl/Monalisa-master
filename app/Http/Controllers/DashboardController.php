<?php

namespace App\Http\Controllers;

use App\Models\Baseline;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Order;
use App\Models\Pelaksana;
use App\Models\Projects;
use App\Models\User;
use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){//dd(Auth()->user());
        // $data = User::whereNotIn('username',['sa','admin'])->orderBy('name')->get();
        // if(!in_array(auth()->user()->roles->first()->name, ['Super Admin','Admin'])){
        //     $data = $data->where('id', auth()->user()->id);
        // }
        // // $data = User::all();
        // foreach($data as $d){
        //     $d->today = $d->story->where('date_story', Carbon::today()->toDateString())->where('deleted_at','==',null)->count();
        //     $d->yesterday = $d->story->where('date_story', Carbon::yesterday()->toDateString())->where('deleted_at','==',null)->count();
        //     $d->dayMin_3 = $d->story->where('date_story', Carbon::today()->add(-2,'day')->toDateString())->where('deleted_at','==',null)->count();
        // }

        // $order = Order::where('user_id', Auth()->user()->id)->get();
        // \Assets::addJs('admin\dashboard.js');

        
        $roleId = Auth()->user()->roles->first()->id;
        $dataArea = null;
        if(in_array($roleId, [ env('SURVEYOR_ID'), env('LE_ID'), env('PEMDA_ID') ])){
            
            $area = Area::where('id', Auth()->user()->kabkot_id)->first();

            $listKec = isset(Auth()->user()->area->child_area) ? Auth()->user()->area->child_area : null;
            
            $kelItem = [];
            $baseline = null;
            if($listKec){
                foreach($listKec as $kec){
                    $listKel = $kec->child_area;
                    foreach($listKel as $kel){
                        $kelItem[] = $kel->id;
                    }
                }
                $baseline = Baseline::summaryByKabKot($kelItem);
                $countBaseline = Baseline::whereIn('kel_id', $kelItem)->count();
                $countPelaksana = Pelaksana::where('kabkot_id', Auth()->user()->kabkot_id)->count();
                $countWeeklyReport = Projects::join('baselines as b', 'b.id', 'projects.baseline_id')->whereIn('kel_id', $kelItem)->count();
                
                $subArea = Area::where('id', auth()->user()->kabkot_id)->first();
                $countSubArea = count($subArea->child_area);
                $subSubArea = 0;
                foreach($subArea->child_area as $kec){
                    $subSubArea += count($kec->child_area);
                }
                
                $countArea = $countSubArea + $subSubArea;
            }
            
        }else{
            // $dataArea = Area::getAreaHirarki();
            $baseline = Baseline::All();;
            // $area = Area::where('type', 3)->get();
            $countBaseline = Baseline::count();
            $countPelaksana = Pelaksana::count();
            $countWeeklyReport = Projects::count();
            $countArea = Area::count();

            $area = Area::where('type', 1)->orderBy('name', 'ASC')->get();

            foreach($area as $item){//dd(Baseline::select('kel_id', DB::raw('substr(kel_id, 1, 2)'))->first());
                $currentBaseline = Baseline::where(DB::raw('substr(kel_id, 1, 2)'), $item->id)->get();
                $item->countBaseline = count($currentBaseline);
                $item->unAssignBaseline = $currentBaseline->where('progres_fissik', null)->count();
                $item->p0 = $currentBaseline->where('progres_fisik', 1)->count();
                $item->p50 = $currentBaseline->where('progres_fisik', 2)->count();
                $item->p100 = $currentBaseline->where('progres_fisik', 3)->count();
            }
        }
        
        return view('dashboard', compact('countBaseline', 'countPelaksana', 'countWeeklyReport', 'countArea', 'area', 'baseline', 'dataArea'));
    }
}
