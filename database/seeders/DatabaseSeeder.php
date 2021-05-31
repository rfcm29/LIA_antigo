<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Itens;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User_type;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User_type::create([
            'descricao' => 'admin'
        ]);

        User_type::create([
            'descricao' => 'user'
        ]);
        User::create([
            'user_type' => '1',
            'name' => 'Lia',
            'email' => 'lia@ipvc.pt',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'telefone' => '123456789',
            'remember_token' => Str::random(10),
        ]);
        Categoria::create([
            'descricao' => 'Audio'
        ]);

        Categoria::create([
            'descricao' => 'Fotografia'
        ]);
    }
}
