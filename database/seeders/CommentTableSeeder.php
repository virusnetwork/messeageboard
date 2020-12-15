<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creates a single entry to work off of as its not randomised 
        $a=new Comment();
        $a->comment_content="Hello blog";
        $a->author_id=1;
        $a->post_id=1;
        $a->save();

        $users = Comment::factory()->count(50)->create();
    }
}
