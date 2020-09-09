<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\BaseModel;

class Story extends BaseModel
{
	protected $table = 'storys';
	Protected $keyType = 'string';
	Public $incrementing = false;
	Protected $fillable = ['id','date_story','check_in','check_out','location','user_id','status','created_at','updated_at','deleted_at',];
	Protected $hidden = ['id'];
	public $fieldOnGrid = ['date_story','check_in','check_out','location','status'];
	public $fieldOnForm = ['date_story','location','check_in','check_out'];

	public function scopeFetch($query, $request){
        $query->where('deleted_at',null);
        $query->where('user_id', $request->user_id);
		return $this->scopeBaseFetch($query,$request,['orderBy' => 'date_story']);
	}
	//

	public function users(){
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	public function story_detail(){
	    return $this->hasMany(Story_detail::class,'story_id', 'id');
    }
}
