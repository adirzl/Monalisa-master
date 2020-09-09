<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Testing extends BaseModel
{
	Protected $fillable = ['id','nama','alamat',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['id','nama','alamat',];
	public $fieldOnForm = ['id','nama','alamat',];

	public function scopeFetch($query, $request){
		return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	}
    //
}
