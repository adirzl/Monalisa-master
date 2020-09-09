<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Report extends BaseModel
{
	Protected $table = 'storys';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','date_story','check_in','check_out','location','user_id','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['id','date_story','check_in','check_out','location','user_id','status','created_at','updated_at','deleted_at',];
	public $fieldOnForm = ['id','date_story','check_in','check_out','location','user_id','status','created_at','updated_at','deleted_at',];

	public function scopeFetch($query, $request){
		return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	}
    //
}
