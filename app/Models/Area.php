<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Area extends BaseModel
{
    protected $primaryKey = 'code';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','name','type','parent_id','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['name','type','parent_id'];
	public $fieldOnForm = ['name','type','parent_id'];
	public $defaultSortBy = 'name';
	public $defaultSortType = 'Desc';

    //

    public function parent_area(){
        return $this->hasOne(Area::class, 'id', 'parent_id');
    }
    
    public function child_area(){
        return $this->hasMany(Area::class, 'parent_id', 'id');
    }
    
    public function Baseline(){
        return $this->hasOne(Baseline::class, 'id', 'kel_id');
    }

    public function scopeGetKelFromKabKot($query, $id = null){
        if($id == null){
            $listKec = Auth()->user()->area->child_area;
        }else{
            $tempKec = Area::where('code', $id)->where('type', 2)->first();
            $listKec = $tempKec->child_area;
        }

        $kelItem = [];
        foreach($listKec as $kec){
            $listKel = $kec->child_area;
            foreach($listKel as $kel){
                $kelItem[] = $kel->id;
            }
        }

        return $kelItem;
    }

    public function scopeGetAreaHirarki(){
        set_time_limit(0); 
        $provinsi = Area::where('type', 1)->get();
        $result = [];

        foreach($provinsi as $item){
            $result[$item->id] = [
                'name' => $item->name,
                'kabkot' => $item->child_area
            ];

            foreach($item->child_area as $keyKec => $kec){
                $result[$item->id]['kabkot'][$keyKec]->kec = $kec->child_area;

                foreach($kec->child_area as $keyKel => $kel){
                    $result[$item->id]['kabkot'][$keyKec]['kec'][$keyKel]->kel = $kel->child_area;
                }

            }
        }

        return $result;        
    }

//     public function scopeGetCountPerProvinsi($query){
//         $query->where('type', 1)->orderBy('name', 'ASC')->get();

//         foreach($query->get() as $item){dd($item);
//             $currentBaseline = Baseline::where(DB::raw('substr(kel_id, 1, 2)'), $item->id)->get();
//             $item->countBaseline = count($currentBaseline);
//             $item->unAssignBaseline = $currentBaseline->where('progres_fissik', null)->count();
//             $item->p0 = $currentBaseline->where('progres_fisik', 1)->count();
//             $item->p50 = $currentBaseline->where('progres_fisik', 2)->count();
//             $item->p100 = $currentBaseline->where('progres_fisik', 3)->count();
//         }
// dd($query->get());
//         return $query->paginate(config('app.display_per_page'));
//     }
    
}
