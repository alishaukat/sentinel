<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->truncate();
            DB::table('roles')->truncate();
            DB::table('role_users')->truncate();
            
            $roles = [
                [
                    "slug" => 'super-admin',
                    "name" => 'Super-admin',
                        'permissions' => [
                                'admin' => true,
                    ]
                ],
            ];
            
            foreach($roles as $role)
            {
                Sentinel::getRoleRepository()->createModel()->create($role);
            }
    }
}
