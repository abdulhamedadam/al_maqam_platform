<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;*/

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Create the Super-Admin role
            $role = Role::create(['guard_name' => 'admin', 'title' => json_encode(['ar' => 'Super-Admin', 'en' => 'Super-Admin']),'name' => 'Super-Admin']);

            $user = Admin::create([
                'name' => 'main_admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456789'),
                'real_password' => '123456789',
                'remember_token' => Str::random(10),
                'group_name'=>$role->id,
            ]);



// Assign the role to the user
            $user->assignRole($role);

        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();

        }
//        Admin::factory()->count(10)->create();
    }
}
