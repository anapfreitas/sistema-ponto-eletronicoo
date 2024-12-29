<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Funcionario;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nome' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role' => 'Administrador',
        ]);

        User::create([
            'nome' => 'Raissa',
            'email' => 'raissa@example.com',
            'password' => bcrypt('raissa'), 
            'role' => 'Funcionário', 
        ]);

    }
}
