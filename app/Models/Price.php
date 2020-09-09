<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Price extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','outlet_id','product_id','price', 'vendor_price','description','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['outlet_id','product_id','price', 'vendor_price', 'description'];
	public $fieldOnForm = ['outlet_id','product_id','price', 'vendor_price', 'description'];

    public $defaultSortBy = 'id';

    public $defaultSortType = 'Desc';

    public function outlet(){
        return $this->hasOne(Outlet::class, 'id', 'outlet_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
