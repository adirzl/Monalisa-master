<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Detailcart extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','cart_id','product_id','price','qty','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['id','cart_id','product_id','price','qty','status','created_at','updated_at','deleted_at',];
	public $fieldOnForm = ['id','cart_id','product_id','price','qty','status','created_at','updated_at','deleted_at',];
	public $defaultSortBy = 'name';
	public $defaultSortType = 'Desc';

    //

    public function product(){
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
