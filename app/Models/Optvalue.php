<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Optvalue extends BaseModel
{
	Protected $table = 'opt_values';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','opt_group_id','key','value','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['opt_group_id','key','value','created_at','updated_at','deleted_at',];
	public $fieldOnForm = ['opt_group_id','key','value'];

	public function scopeFetch($query, $request){
		return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	}

	public function optgroup(){
	    return $this->hasOne(Optgroup::class,'id','opt_group_id');
    }

//    public function option_group()
//    {
//        return $this->belongsTo(Optgroup::class)->orderBy('sequence');
//    }
    //
}
