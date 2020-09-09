<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Optgroup extends BaseModel
{
	Protected $table = 'opt_groups';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','name','group','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['name','group','status',];
	public $fieldOnForm = ['name','group','status',];

	public function scopeFetch($query, $request){
		return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	}

    public function option_values()
    {
        return $this->hasMany(Optvalue::class,'opt_group_id','id');
    }
    //
}
