<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'identification' => '2150045710',
            'last_name' => 'Guerrero Tandazo',
            'first_name' => 'Ernesto Jair',
            'level_id' => 1,
            'gender' => 'Masculino',
            'phone' => '',
            'mobile' => '0986496051',
            'email' => 'ernestojair2020@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);
    }
}
