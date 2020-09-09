<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story_detail extends Model
{
    Protected $fillable = ['id','story_id','task','status','description', 'obstacle','created_at','updated_at','deleted_at',];

    public $keyType = 'string';
}
