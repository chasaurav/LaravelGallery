<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'img_name' => '1.jpeg',
            'user_id' => 1,
        ]);

        Post::create([
            'img_name' => '2.jpeg',
            'user_id' => 2,
        ]);
    }
}
