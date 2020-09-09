<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PermissionsTablesSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $roleTable = 'roles';

    /**
     * @var string
     */
    protected $pageTable = 'pages';

    /**
     * @var string
     */
    protected $permissionTable = 'permissions';

    /**
     * @var string
     */
    protected $roleHasPageTable = 'role_has_pages';



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->pageTable)->delete();
        DB::table($this->roleTable)->delete();
        DB::table($this->permissionTable)->delete();
        DB::statement('alter sequence ' . $this->permissionTable . '_id_seq restart with 1');

        $now = \Carbon\Carbon::now();
        /****************************************** Pages ******************************************/
        $pages = [
            [
                'id' => Str::uuid(), 'label' => 'Dashboard', 'uri' => 'dashboard', 'icon' => 'home',
                'parent_id' => null, 'sequence' => '1', 'visible' => 1, 'created_at' => $now, 'updated_at' => $now,
                'childs' => [],
            ],
            [
                'id' => Str::uuid(), 'label' => 'Access Control', 'uri' => 'javascript:void(0);', 'icon' => 'apps',
                'parent_id' => null, 'sequence' => '2', 'visible' => 1, 'created_at' => $now, 'updated_at' => $now,
                'childs' => [
                    [
                        'id' => Str::uuid(), 'label' => 'Page', 'uri' => 'page', 'icon' => 'radio_button_unchecked',
                        'sequence' => '2.1', 'visible' => 1, 'created_at' => $now, 'updated_at' => $now, 'childs' => [],
                    ],
                    [
                        'id' => Str::uuid(), 'label' => 'Permission', 'uri' => 'permission', 'icon' => 'radio_button_unchecked',
                        'sequence' => '2.2', 'visible' => 1, 'created_at' => $now, 'updated_at' => $now, 'childs' => [],
                    ],
                ],
            ],
        ];

        foreach ($pages as $page) {
            $childs = null;

            if (!empty($page['childs'])) {
                $childs = $page['childs'];
            }

            Arr::forget($page, 'childs');
            DB::table($this->pageTable)->insert($page);

            if (!is_null($childs)) {
                $n = count($childs);

                for ($i = 0; $i < $n; $i++) {
                    $childs[$i]['parent_id'] = $page['id'];
                    Arr::forget($childs[$i], 'childs');
                }

                DB::table($this->pageTable)->insert($childs);
            }
        }

        /****************************************** Roles ******************************************/
        if (DB::table($this->roleTable)->count() == 0) {
            $roles = [
                ['id' => 1, 'name' => 'Super Admin', 'guard_name' => 'web', 'created_at' => $now, 'updated_at' => $now],
            ];

            foreach ($roles as $role)
                DB::table($this->roleTable)->insert($role);
        }

        /****************************************** Permissions ******************************************/
        $permissions = [
            ['name' => 'delete_all log-application', 'guard_name' => 'web', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'clean log-application', 'guard_name' => 'web', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'delete log-application', 'guard_name' => 'web', 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach (map_action_uri() as $permission) {
            $permissions[] = [
                'name' => $permission, 'guard_name' => 'web', 'created_at' => $now, 'updated_at' => $now
            ];
        }

        DB::table($this->permissionTable)->insert($permissions);

        $pages = \App\Models\Master\Page::select('id', 'label', 'uri')->orderBy('sequence')->get();
        $roles = \App\Models\Master\Role::all();
        $permissions = collect($permissions);

        if ($roles->count()) {
            foreach ($roles as $role) {
                if ($role->name === 'Super Admin') {
                    $pages->each(function ($item, $key) use ($role) {
                        DB::table($this->roleHasPageTable)->insert(['role_id' => $role->id, 'page_id' => $item['id']]);
                    });
                    $role->givePermissionTo($permissions->pluck('name')->toArray());
                }
            }
        }
    }
}
