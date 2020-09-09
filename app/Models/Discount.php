<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Discount extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','name','percentage','description','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['name','percentage','description','status'];
	public $fieldOnForm = ['name','percentage','description'];
    public $defaultSortBy = 'name';

    public $defaultSortType = 'Desc';
	// public function scopeFetch($query, $request){
	// 	return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	// }
    //
}
