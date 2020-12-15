<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creates a single entry to work off of as its not randomised 
        $a = new User();
        $a->username = "JohnBlogs69";
        $a->name="John Blogs";
        $a->email="johnblogs@email.com";
        $a->password = "password";
        $a->save();

        $users = User::factory()->count(25)->create();
    }
}
