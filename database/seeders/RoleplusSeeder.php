<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleplusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolepluses')->insert([
            ["nom"=>"auteur"],
            ["nom"=>"éditeur"],
        ]);
    }
}
