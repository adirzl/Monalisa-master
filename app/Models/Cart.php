<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Cart extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','user_id','ordertype','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['id','user_id','ordertype','status','created_at','updated_at','deleted_at',];
	public $fieldOnForm = ['id','user_id','ordertype','status','created_at','updated_at','deleted_at',];
	public $defaultSortBy = 'name';
    public $defaultSortType = 'Desc';

    public function detailcart(){
        return $this->hasMany(detailcart::class, 'cart_id', 'id');
    }

    //
}
