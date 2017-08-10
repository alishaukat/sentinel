<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->truncate();

            $admin = [
                    'id'        => 1,
                    'first_name'=> 'Admin',
                    'last_name' => 'User',
                    'email'     => 'admin@example.com',
                    'password'  => 'secret',
            ];

            $adminUser = Sentinel::registerAndActivate($admin);
            $adminRole = Sentinel::findRoleBySlug('super-admin');

            $adminUser->roles()->attach($adminRole);
            $faker = Faker::create();
            
            $roles = Sentinel::getRoleRepository()->get();
            $total_roles = count($roles);
            for($i=0; $i < 100; $i++)
            {
                $user = [
                    'first_name'    => $faker->firstName,
                    'last_name'     => $faker->lastName,
                    'email'         => $faker->email,
                    'password'      => 'secret',
                ];
                $userObject = Sentinel::registerAndActivate($user);
                $roleIndex = rand(0, $total_roles);
                
                // We don't want to assign admin role to anyone
                // We want some users without any role
                if($roleIndex != 0){
                    $role = Sentinel::findRoleById($roleIndex);
                    $userObject->roles()->attach($role);
                }
            }
            
    }
}
