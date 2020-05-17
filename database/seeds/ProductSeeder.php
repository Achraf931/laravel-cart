<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fr_FR');
        for ($i = 0; $i < 10; $i++)
        {
            $product = new \App\Product();
            $product->title = $faker->word;
            $product->image = 'https://i.picsum.photos/id/' . mt_rand(400, 800) . '/600/400.jpg';
            $product->color = $faker->colorName;
            $product->description = $faker->realText(200);
            $product->price = mt_rand(10, 3999);
            $product->save();
        }
    }
}
