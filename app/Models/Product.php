<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Product extends BaseModel
{
	Protected $keyType = 'string';
    Public $incrementing = false;

	Protected $fillable = ['id','name','category_id','unit_id','description','status','created_at','updated_at','deleted_at',];
    Protected $hidden = ['id'];

	public $fieldOnGrid = ['name','category_id','unit_id','is_unlimited','status'];
	public $fieldOnForm = ['name','category_id','unit_id','description'];
    public $defaultSortBy = 'name';
    public $defaultSortType = 'Desc';

    public function price(){
        return $this->hasMany(Price::class, 'product_id', 'id')->where('outlet_id', Auth()->user()->outlet_id);
    }

    public function stock(){
        return $this->hasMany(Stock::class, 'product_id', 'id')->where('outlet_id', Auth()->user()->outlet_id);
    }

    public function detailcart(){
        return $this->hasMany(Detailcart::class, 'product_id', 'id')->where('user_id', Auth()->user()->id);
    }
}
