<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::create([
            'name'=>'faisal ahsan',
            'email'=>'faisalehsan2040@gmail.com',
            'password' =>bcrypt('123456'),
        ]);

        $role = Role::create(['name'=>'Admin']);
        $permission = Permission::pluck('id','id')->all();
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
    }
}
