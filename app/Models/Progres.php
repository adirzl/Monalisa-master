<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','tgl_pelaporan','minggu_ke','note_pelaksanaan','progres_fisik','jml_ts_img','directory_file', 'project_id'];
	Protected $hidden = ['id'];

	public function project(){
		return $this->belongsTo(Projects::class, 'project_id', 'id');
	}
}
