<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            RoleplusSeeder::class,
            LikeSeeder::class,
            NoteSeeder::class,
            TagSeeder::class,
            UserSeeder::class
        ]);
    }
}
