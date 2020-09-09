<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Projects extends BaseModel
{
	Protected $table = 'projects';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','tgl_pelaporan','area_id','minggu_ke','tipe_konstruksi','tipe_tangki','panjang','lebar','tinggi','diameter','km_sa','km_ts','km_ta','pengadaan','note_pengadaan','pelaksanaan','note_pelaksanaan','tgl_realisasi_awal','tgl_realisasi_akhir','progres_fisik','jml_ts','jml_ts_50','created_by','verified_1_by','verified_2_by','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['tgl_pelaporan','minggu_ke','baseline_id'];
	public $fieldOnForm = ['tgl_pelaporan','area_id','minggu_ke','tipe_konstruksi','tipe_tangki','panjang','lebar','tinggi','diameter','km_sa','km_ts','km_ta','pengadaan','note_pengadaan','pelaksanaan','note_pelaksanaan','tgl_realisasi_awal','tgl_realisasi_akhir','progres_fisik','jml_ts','jml_ts_50','created_by','verified_1_by','verified_2_by','created_at','updated_at','deleted_at',];
	public $defaultSortBy = 'created_at';
	public $defaultSortType = 'Desc';

    public function baseline(){
        return $this->belongsTo(Baseline::class, 'baseline_id', 'id');
	}
	
	public function progres(){
		return $this->hasMany(Progres::class, 'project_id', 'id')->orderBy('minggu_ke', 'DESC');
	}
}
