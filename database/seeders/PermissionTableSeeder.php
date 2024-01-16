<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tables = ['role','countries', 'departments', 'customers', 'genders','skills','languages','currencies','employee_types','resignation_statuses','users','company_types','categories','sources','contacts','leads','projects'];

        foreach ($tables as $table) {
            $permissions = [
                $table . '-list',
                $table . '-create',
                $table . '-edit',
                $table . '-delete',
            ];

            foreach ($permissions as $permission) {
                if (!Permission::where('name', $permission)->exists()) {
                    Permission::create(['name' => $permission]);
                }
            }
        }
    }
}
