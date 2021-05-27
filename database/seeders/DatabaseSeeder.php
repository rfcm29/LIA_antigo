<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Itens;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User_type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Categoria::create([
            'descricao' => 'Audio'
        ]);

        Categoria::create([
            'descricao' => 'Fotografia'
        ]);

        User_type::create([
            'descricao' => 'admin'
        ]);

        User_type::create([
            'descricao' => 'user'
        ]);
    }
}
