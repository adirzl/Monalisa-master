<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Baseline extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','kec','kel','nama','alamat','nama_responden','kesesuaian_alamat','hubungan_keluarga','jenis_kelamin','tempat_melakukan_bab','tempat_pembuangan_dari_wc','material_dinding_ts','material_dasar_ts','pembangunan_ts','pengurasan_tangki_terakhir','ketersediaan_lahan','septik_komunal','ketersediaan_air_bersih','kesediaan_mengikuti','iuran_bulanan','hasil_survey','alasan_ineligible','lainnya','latitude','longitude','tgl_survey','kepemilikan_ts','syarat_teknis_ts','status','kel_id'];
	Protected $hidden = [];
	public $fieldOnGrid = ['id', 'nama', 'alamat', 'kec', 'status'];
	public $fieldOnForm = ['id','kec','kel','nama','alamat','nama_responden','kesesuaian_alamat','hubungan_keluarga','jenis_kelamin','tempat_melakukan_bab','tempat_pembuangan_dari_wc','material_dinding_ts','material_dasar_ts','pembangunan_ts','pengurasan_tangki_terakhir','ketersediaan_lahan','septik_komunal','ketersediaan_air_bersih','kesediaan_mengikuti','iuran_bulanan','hasil_survey','alasan_ineligible','lainnya','latitude','longitude','tgl_survey','kepemilikan_ts','syarat_teknis_ts','status',];
	public $defaultSortBy = 'nama';
	public $defaultSortType = 'ASC';

    public function Area(){
        return $this->hasOne(Area::class, 'id', 'kel_id');
    }

    public function Project(){
        return $this->hasOne(Projects::class, 'baseline_id', 'id');
    }
    
    public function scopeFetch($query, $request)
    {
        foreach($this->fillable as $item){
            if($item == 'kel_id'){
                if($request->kabkot_id){
                    $query->where('kel_id', 'like', $request->kabkot_id.'%');
                }
            }else{
                if($request->{$item}){
                    if($item == 'created_at'){
                        $query->whereDate($item, $request->{$item});
                    }else{
                        $query->where($item, 'ilike', '%'.$request->{$item}.'%');
                    }
                }
            }
        }

        $query->whereNull('deleted_at');


        return $query->orderBy($this->defaultSortBy, $this->defaultSortType)->paginate(config('app.display_per_page'));
    }
    
    public function scopeSummaryByKabKot($query, $kelList = []){
        $query->join('projects as p', 'p.baseline_id', 'baselines.id');
        
        if($kelList){
            $query->whereIn('kel_id', $kelList);
        }

        $query->where('p.created_at', '>', Carbon::now()->startOfWeek())
            ->where('p.created_at', '<', Carbon::now()->endOfWeek());

        return $query;
    }

    public function scopeGetSurveyorTask($query, $request){
        $query->where('pelaksana_id', auth()->user()->id);

        return $query->orderBy('nama', 'ASC')->paginate(config('app.display_per_page'));
    }

    // public function scopeGetCountBaselinePerProvinsi(){
    //     $provinsi = Area::where('type', 1)->get();
    //     $result = [];

    //     foreach($provinsi as $item){
    //         $result[$item->id] = [
    //             'name' => $item->name,
    //             'kabkot' => $item->child_area
    //         ];

    //         foreach($item->child_area as $keyKec => $kec){
    //             $result[$item->id]['kabkot'][$keyKec]->kec = $kec->child_area;

    //             foreach($kec->child_area as $keyKel => $kel){
    //                 $result[$item->id]['kabkot'][$keyKec]['kec'][$keyKel]->kel = $kel->child_area;
    //             }

    //         }
    //     }

    //     return $result;
        
    // }
    //
}
