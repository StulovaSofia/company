<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            [
                'title' => 'admin',
                'description' => 'admin',
            ],
            [
                'title' => 'user',
                'description' => 'user',
            ],
        ]);

        DB::table('tarrifs')->insert([
            [
                'title' => 'free',
                'cost' => 50,
            ],
            [
                'title' => 'premium',
                'cost' => 70,
            ],
            [
                'title' => 'vip',
                'cost' => 100,
            ],
        ]);

        DB::table('genres')->insert([
            [
                'title' => 'action',
                'description' => 'action',
            ],
            [
                'title' => 'comedy',
                'description' => 'comedy',
            ]
        ]);

        DB::table('producers')->insert([
            [
                'firstname' => 'Ivan',
                'lastname' => 'Ivanov',
                'age' => 40,
            ],
            [
                'firstname' => 'Petr',
                'lastname' => 'Petrov',
                'age' => 20,
            ],
            [
                'firstname' => 'Sidor',
                'lastname' => 'Sidorov',
                'age' => 30,
            ],
        ]);

        DB::table('films')->insert([
            [
                'id_producer' => 1,
                'title' => 'film1',
                'description' => 'film1',
                'year' => 2006,
                'duration' => 120,
                'country' => 'Japan',
            ],
            [
                'id_producer' => 1,
                'title' => 'film2',
                'description' => 'film2',
                'year' => 2007,
                'duration' => 130,
                'country' => 'USA',
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'login' => 'admin',
                'password' => '1234',
                'id_tarrif' => 1,
                'id_level' => 1,
            ],
        ]);

        DB::table('orders')->insert([
            [
                'id_user' => 1,
                'id_tarrif' => 1,
            ],
        ]);

        DB::table('films_tarrifs')->insert([
            [
                'id_film' => 1,
                'id_tarrif' => 1,
            ],
        ]);

        DB::table('films_genres')->insert([
            [
                'id_films' => 1,
                'id_genres' => 1,
            ],
        ]);
    }
}
