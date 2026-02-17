<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(
            ['nombre' => 'Admin'],
            ['descripcion' => 'Administrador con acceso total']
        );

        Role::firstOrCreate(
            ['nombre' => 'Usuario'],
            ['descripcion' => 'Usuario estándar con permisos limitados']
        );
    }
}
