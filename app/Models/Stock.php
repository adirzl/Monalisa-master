<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Stock extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','outlet_id','product_id','purchase_price','qty','description','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['outlet_id','product_id','purchase_price','qty', 'created_at'];
	public $fieldOnForm = ['outlet_id','product_id','purchase_price','qty','description'];
    public $defaultSortBy = 'created_at';

    public $defaultSortType = 'Desc';
	// public function scopeFetch($query, $request){
	// 	return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	// }
    //

    public function scopeGetStock($query, $request){
        if($request->outlet_id){
            $query->where('outlet_id', $request->outlet_id);
        }

        if($request->product_id){
            $query->where('product_id', $request->product_id);
        }

        return $query->sum('qty');
    }

    public function outlet(){
        return $this->hasOne(Outlet::class, 'id', 'outlet_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
