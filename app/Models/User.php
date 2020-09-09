<?php

namespace App\Models;

use App\Models\Relasi\Modelhasroles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username','name', 'email', 'password', 'force_change_password','kabkot_id','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $fieldOnGrid = ['username', 'name', 'email'];

    public function scopeGetFieldOnGrid(){
        return $this->fieldOnGrid;
    }

    public function scopeFetch($query, $request){
        foreach($this->fieldOnGrid as $item){
            if($request->{$item}){
                $query->where($item, 'like', '%'.$request->{$item}.'%');
            }
        }
        return $query->orderBy('name', 'ASC')->paginate(config('app.display_per_page'));
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function story(){
        return $this->hasMany(Story::class, 'user_id', 'id');
    }

    public function modelhasroles(){
        return $this->hasOne(Modelhasroles::class, 'model_id', 'id');
    }
    

    public function area(){
        return $this->hasOne(Area::class, 'id', 'kabkot_id');
    }

    public function pelaksana(){
        return $this->hasOne(Pelaksana::class, 'user_id', 'id');
    }

    public function scopeGetUserPemda($query, $request){
        $query->select('users.id', 'users.username', 'users.name', 'users.email', 'users.status', 'users.kabkot_id')
            ->join('model_has_roles as m', 'm.model_id', 'users.id')
            ->join('roles as r', 'r.id', 'm.role_id')
            ->where('r.id', env('PEMDA_ID'));

        if($request->kabkot_id){
            $query->where('kabkot_id', $request->kabkot_id);
        }

        if($request->username){
            $query->where('username', $request->username);
        }

        if($request->status){
            $query->where('status', $request->status);
        }

        return $query->orderBy('users.name', 'ASC')->paginate(config('app.display_per_page'));
    }

    public function scopeGetUserLe($query, $request){
        $query->select('users.id', 'users.username', 'users.name', 'users.email', 'users.status', 'users.kabkot_id')
            ->join('model_has_roles as m', 'm.model_id', 'users.id')
            ->join('roles as r', 'r.id', 'm.role_id')
            ->where('r.id', env('LE_ID'));

        if($request->kabkot_id){
            $query->where('kabkot_id', $request->kabkot_id);
        }

        if($request->username){
            $query->where('username', $request->username);
        }

        if($request->status){
            $query->where('status', $request->status);
        }

        return $query->orderBy('users.name', 'ASC')->paginate(config('app.display_per_page'));
    }

    public function scopeFetchPelaksana($query, $request){
        $query->select('users.id', 'users.username', 'users.name', 'users.email', 'users.status', 'users.kabkot_id')
            ->join('model_has_roles as m', 'm.model_id', 'users.id')
            ->join('roles as r', 'r.id', 'm.role_id')
            ->where('r.id', env('SURVEYOR_ID'));


        if($request->kabkot_id){
            $query->where('users.kabkot_id', auth()->user()->kabkot_id);
        }

        if($request->username){
            $query->where('username', $request->username);
        }

        if($request->status){
            $query->where('status', $request->status);
        }

        return $query->orderBy('users.name', 'ASC')->paginate(config('app.display_per_page'));
    }

    public function scopeGetUserPelaksana($query, $request){
        $query->select('users.id', 'users.username', 'users.name', 'users.email', 'users.status', 'users.kabkot_id')
            ->join('model_has_roles as m', 'm.model_id', 'users.id')
            ->join('roles as r', 'r.id', 'm.role_id')
            ->where('users.kabkot_id', auth()->user()->kabkot_id)
            ->where('r.id', env('SURVEYOR_ID'));

        if($request->username){
            $query->where('username', $request->username);
        }

        if($request->status){
            $query->where('status', $request->status);
        }

        return $query->orderBy('users.name', 'ASC')->paginate(config('app.display_per_page'));
    }

    public function scopeGetCountPelaksana($query, $request){
        $query->join('model_has_roles as m', 'm.model_id', 'users.id')
            ->join('roles as r', 'r.id', 'm.role_id')
            ->where('users.kabkot_id', auth()->user()->kabkot_id)
            ->where('r.id', env('SURVEYOR_ID'));

        if($request->kabkot_id){
            $query->where('users.kabkot_id', auth()->user()->kabkot_id);
        }

        return $query->count();
    }
}
