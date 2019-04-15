<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        // $this->call(UsersTableSeeder::class);

        DB::insert('INSERT INTO nivel_models (nome, abreviatura) VALUES(?, ?)',
    		array('Ensino Médio', 'Médio'));

        DB::insert('INSERT INTO nivel_models (nome, abreviatura) VALUES(?, ?)',
    		array('Graduação Técnico', 'Técnico'));

        DB::insert('INSERT INTO nivel_models (nome, abreviatura) VALUES(?, ?)',
    		array('Graduação Bacharel', 'Bacharel'));

        DB::insert('INSERT INTO nivel_models (nome, abreviatura) VALUES(?, ?)',
    		array('Graduação Licenciatura', 'Licenciatura'));

    }
}
