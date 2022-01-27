<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $post = new Post();
            $post->title = $faker->sentence(5);
            $post->sub_title = $faker->sentence(10);
            $post->slug = Str::slug($post->title);
            $post->image = $faker->imageUrl(800, 600, 'Posts', true, $post->title);
            $post->text = $faker->paragraphs(5, true);
            $post->save();
        }
    }
}
