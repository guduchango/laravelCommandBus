<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Post;

class SaveUserPosts extends TestCase
{


    public function test_its_user_post_save()
    {

        $user = factory(User::class,1)->make();
        $posts = factory(Post::class,5)->make();

        $postsArray=[];
        foreach($posts as $var)
        {
            $array = [
                'type' => 'posts',
                'id' => 1,
                'attributes' => $var['attributes']
            ];

            $postsArray[] = $array;
        }

          $array = [
                'data' => [
                    'type' => 'users',
                    'attributes' => $user->toArray(),
                ],
                'included' => $postsArray
            ];


            $this->post(route('users.store'),$array)
                 ->seeJson([
                     'status' => 'success',
            ]);

    }
}
