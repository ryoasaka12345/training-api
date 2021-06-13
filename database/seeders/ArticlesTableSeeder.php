<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

/* 
    Database Seeding:
        the process of filling up our database with dummy data
        that we can use to test it.
*/
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate our existing records
        Article::truncate();

        $faker = \Faker\Factory::create();

        // create a few articles in the database
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }
}
