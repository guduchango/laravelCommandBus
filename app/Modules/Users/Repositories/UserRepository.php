<?php

namespace App\Modules\Users\Repositories;

use App\User;
use App\Post;

class UserRepository implements UserRepositoryInterface
{

    protected $user;

    protected $post;

    public function __construct()
    {
        $this->user = new User();
        $this->post = new Post();
    }

    public function userSave($userArray=[])
    {
        $this->user->fill($userArray);
        return $this->user->save();
    }

    public function postSave($post=[])
    {
        $this->post->fill($post);
        return $this->post->save();
    }

}