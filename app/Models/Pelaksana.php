<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Pelaksana extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','name','phone','nilai_kontrak','spmk_no','spmk_date','spmk_start_date','status','created_at','updated_at','deleted_at','kabkot_id','user_id'];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['spmk_no', 'name', 'phone','status'];
	public $fieldOnForm = ['name','phone','nilai_kontrak','spmk_no','spmk_date','spmk_start_date'];
	public $defaultSortBy = 'created_at';
	public $defaultSortType = 'Desc';

    //
}
