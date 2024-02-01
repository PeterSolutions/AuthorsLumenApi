<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        // Vaciar la tabla de autores primero para evitar duplicados
        DB::table('authors')->truncate();

        // Crear 50 autores utilizando la factory
        \Illuminate\Database\Eloquent\Factories\Factory::factoryForModel(Author::class)->count(50)->create();


    }
}
