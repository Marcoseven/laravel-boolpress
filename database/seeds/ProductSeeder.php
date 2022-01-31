<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $product = new Product();
            $product->name = $faker->sentence();
            $product->slug = Str::slug($product->name);
            $product->image = $faker->imageUrl(800, 600, 'Products', true, $product->name);
            $product->availability = $faker->boolean();
            $product->quantity = $faker->numberBetween(1, 1000);
            $product->price = $faker->randomFloat(2, 100, 500);
            $product->description = $faker->text();
            $product->save();
        }
    }
}
