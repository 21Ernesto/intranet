<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Estudiante', 'key' => 'Estudiante']);
        Role::create(['name' => 'Docente', 'key' => 'Docente']);
        Role::create(['name' => 'Coordinador', 'key' => 'Coordinador']);
    }
}
