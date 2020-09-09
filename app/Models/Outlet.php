<?php

namespace App\Models;

use App\Models\Master\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Outlet extends BaseModel
{
    /**
     * @var string
     */
    Protected $keyType = 'string';

    /**
     * @var bool
     */
    Public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'pic', 'phone', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public $fieldOnGrid = ['name','address','pic','phone','status'];

    public $fieldOnForm = ['name','address','pic','phone', 'description'];

    public $defaultSortBy = 'name';

    public $defaultSortType = 'Desc';
}
