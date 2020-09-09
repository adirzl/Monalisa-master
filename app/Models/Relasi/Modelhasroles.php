<?php

namespace App\Models\Relasi;

use Illuminate\Database\Eloquent\Model;

class Modelhasroles extends Model
{
    Protected $keyType = 'string';

    Public $incrementing = false;

    public $table = 'model_has_roles';

    public $timestamps = false;
    
    public $fillable = [ 'role_id', 'model_type', 'model_id'];
}
