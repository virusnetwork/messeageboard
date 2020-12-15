<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creates a single entry to work off of as its not randomised 
        $a = new Post();
        $a->title = "Hello world";
        $a->content = "Hello world";
        $a->user_id = 1;
        $a->save();

        $users = Post::factory()->count(15)->create();
    }
}
