<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $objects = factory(Post::class,300)->make();
        foreach($objects as $var)
         {
             Post::create($var->toArray());
         }
     }
}
