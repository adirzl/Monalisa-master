<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table('model_has_roles')->delete();

        $now = now();
        $users = [
            [
                'id' => Str::uuid(), 'username' => 'sa', 'password' => bcrypt('p@ssw0rd'), 'name' => 'Super Admin',
                'email' => 'sa@mail.com', 'email_verified_at' => $now,
                'created_at' => $now, 'updated_at' => $now,
            ]
        ];

        foreach ($users as $user) {
            DB::table($this->table)->insert($user);
            $data = \App\Models\User::find($user['id']);

            if ($data) {
                if ($user['username'] === 'sa')
                    $role = \App\Models\Master\Role::findById(1);

                $data->assignRole($role->name);
//                $data->syncPermissions($role->permissions->pluck('name'));
            }
        }
    }
}
