<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
            'employee_id' => 'Zon-101',
            'first_name' => 'Admin',
            'last_name' => 'zonvoir',
            'email' => 'admin@zonvoir.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'gender_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        $user = User::findOrFail(1);
        $user->skills()->attach([1,2,3,4]);
        $user->languages()->attach([1,2,3,4]);

        $role = Role::create([
            'name' => 'Admin',
            'color' => '#FFFFFF', // Set your default color here
        ]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
