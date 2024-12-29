<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Funcionario;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::where('email', 'raissa@example.com')->first();

        if ($user) {
            Funcionario::create([
                'nome' => 'Raissa',
                'cargo' => 'Ordenhador(a)',
                'user_id' => $user->id, 
            ]);
        }
    }
}
