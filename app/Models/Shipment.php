<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Shipment extends BaseModel
{
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','user_id','order_id','ekspedisi_id','shipment_date','shipment_id','description','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['order_id','ekspedisi_id','shipment_date','shipment_id','status'];
	public $fieldOnForm = ['order_id','ekspedisi_id','shipment_date','shipment_id','description'];
    public $defaultSortBy = 'created_at';

    public $defaultSortType = 'Desc';
	// public function scopeFetch($query, $request){
	// 	return $this->scopeBaseFetch($query,$request,['orderBy' => $this->primaryKey]);
	// }
    //

    public function order(){
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function ekspedisi(){
        return $this->hasOne(Ekspedisi::class, 'id', 'ekspedisi_id');
    }
}
