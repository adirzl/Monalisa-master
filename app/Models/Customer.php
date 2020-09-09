<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Customer extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','name','address','kelurahan','kecamatan','kabkot','province_id','phone','description','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['name','address','phone','status'];
	public $fieldOnForm = ['name','address','kelurahan','kecamatan','kabkot','province_id','phone','description'];
    public $defaultSortBy = 'name';

    public $defaultSortType = 'Desc';
	// public function scopeFetch($query, $request){
	// 	return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	// }
    //

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }
}
