<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Order extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','user_id','ordertype','paymenttype','discount_id' ,'note','discount_percentage', 'customer_id', 'payment_number', 'amount_received','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['created_at', 'user_id','ordertype','paymenttype','status'];
	public $fieldOnForm = ['ordertype','paymenttype','customer_id'];
    public $defaultSortBy = 'created_at';

    public $defaultSortType = 'ASC';
	// public function scopeFetch($query, $request){
	// 	return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	// }
    //

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function detailorder(){
        return $this->hasMany(Detailorder::class, 'order_id', 'id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
