<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Products::create([
                'product_no' => $faker->unique()->buildingNumber,
                'product_name' => $faker->word,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
