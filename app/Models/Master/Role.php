<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
    /**
     * @var string
     */
    protected $roleHasPageTable = 'role_has_pages';

    protected $modelHasRoleTable = 'model_has_roles';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class, $this->roleHasPageTable)
            ->orderByRaw('cast(sequence as float)');
    }

    public function user(){
        return $this->belongsToMany(User::class, $this->modelHasRoleTable, 'role_id', 'model_id');
    }
}
