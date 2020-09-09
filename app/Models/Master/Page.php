<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends BaseModel
{
    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'label', 'uri', 'icon', 'parent_id', 'visible', 'sequence',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
        * @var string
     */
    protected $roleHasPageTable = 'role_has_pages';

    public $fieldOnGrid = ['label','uri'];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFetch($query, $request)
    {
        $query->where('deleted_at', null);
        if ($request->label)
            $query->where('label', 'like', '%' . $request->label . '%');

        if ($request->visible)
            $query->where('visible', $request->visible);

        if ($request->parent_id) {
            if ($request->parent_id == -1)
                $query->whereNull('parent_id');
            else $query->where('parent_id', $request->parent_id);
        }

//        $q = $query->select([
//            'id', 'label', 'uri', 'sequence', 'visible',
//            DB::raw("case when icon is not null then icon else '-' end as icon"),
//            DB::raw("case when parent_id is null then 'Top Level' else (select x.label from " . $this->table . " x where x.id = " . $this->table . ".parent_id) end as parent_id")
//        ])->orderBy('sequence');
//
//        if ($request->has('per_page'))
//            return $request->per_page === 'All' ? $q->get() : $q->paginate($request->per_page);

        return $query->orderBy('sequence')->paginate(config('app.display_per_page'));
    }

    public function Roles(){
        return $this->belongsToMany(Role::class, $this->roleHasPageTable);
    }
}
