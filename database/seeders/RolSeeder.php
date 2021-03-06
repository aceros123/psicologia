<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RoleSuper = Role::create(['name' => 'SuperAdministrador']);
        $RoleAdmin = Role::create(['name' => 'Administrador']);
        $RoleUser =  Role::create(['name' => 'Usuario']);
    }
}
