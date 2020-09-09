<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Configuration extends BaseModel
{
	// Protected $primaryKey = 'key';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['key','value','notes','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['key','value','notes'];
	public $fieldOnForm = ['key','value','notes','status'];
	public $defaultSortBy = 'key';
	public $defaultSortType = 'Desc';

    //
}
