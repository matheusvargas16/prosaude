<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), // Substitua por uma senha segura
            'role' => 'admin', // Atribuindo o papel de administrador
            'cpf' => '12345678901',
            'datanascimento' => '2003-12-23',
            'endereco' => 'rua admin',
            'telefone' => '54981819292',
        ]);
    }
}
