<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Province extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','name','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['name'];
	public $fieldOnForm = ['name'];

    public $defaultSortBy = 'name';

    public $defaultSortType = 'Desc';
}
