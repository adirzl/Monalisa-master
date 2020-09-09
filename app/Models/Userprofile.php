<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Userprofile extends BaseModel
{
	Protected $table = 'users';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','username','name','email','email_verified_at','password','remember_token','outlet_id','created_at','updated_at','kabkot_id','phone',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['id','username','name','email','email_verified_at','password','remember_token','outlet_id','created_at','updated_at','kabkot_id','phone',];
	public $fieldOnForm = ['id','username','name','email','email_verified_at','password','remember_token','outlet_id','created_at','updated_at','kabkot_id','phone',];
	public $defaultSortBy = 'name';
	public $defaultSortType = 'Desc';
	
	public function Area(){
	    return $this->hasOne(Area::class, 'id', 'kabkot_id');
	}

    //
}
