<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        DB::table("entidades")->insert([
                "id" => 1,
                "nome" => "Vitta Sistema",
                "nascimento" => "2020-01-01",
                "foto" => null,
                "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus. ",
                "email" => "vitta@exemplo.io",
                "site" => null,
                "lattes" => null,
                "redes_sociais" => "'RedeSocial' => 'Instagram', 'url' => 'https://www.instagram.com/ediel.rangel',",
                "created_at" => $now,
                "updated_at" => $now,
        ]);
    }
}
