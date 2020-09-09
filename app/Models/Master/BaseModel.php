<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaseModel extends Model
{
    public function scopeGetListOfTables(){
        return collect(DB::select("SELECT table_schema,table_name, table_catalog FROM information_schema.tables WHERE table_schema = 'public' ORDER BY table_name;"));
    }

    public function scopeGetFieldOnGrid(){
        return $this->fieldOnGrid;
    }

    public function scopeGetFieldOnForm(){
        return $this->fieldOnForm;
    }

    public function scopeFetch($query, $request)
    {
        foreach($this->fillable as $item){
            if($request->{$item}){
                if($item == 'created_at'){
                    $query->whereDate($item, $request->{$item});
                }else{
                    $query->where($item, 'ilike', '%'.$request->{$item}.'%');
                }
            }
        }

        $query->whereNull('deleted_at');


        return $query->orderBy($this->defaultSortBy, $this->defaultSortType)->paginate(config('app.display_per_page'));
    }

}
