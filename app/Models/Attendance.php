<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Attendance extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','attendance_date','user_id','check_in','check_out','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['attendance_date','check_in','check_out'];
	public $fieldOnForm = ['attendance_date','check_in','check_out'];

	public function scopeFetch($query, $request){
        $query->where('deleted_at',null);
        $query->where('user_id', $request->user_id);
		return $this->scopeBaseFetch($query,$request,['orderBy' => 'attendance_date']);
	}
    //
}
