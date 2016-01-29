<?php

namespace App\Modules\Users\Repositories;

use App\User;
use App\Post;

/**
 * Class UserRepository
 * @package App\Modules\Users\Repositories
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * @var User
     * User Model
     */
    protected $user;

    /**
     * @var Post
     * Post Model
     */
    protected $post;

    /**
     *
     */
    public function __construct()
    {
        //Inyecto la instancia de los objetos en las variables
        $this->user = new User();
        $this->post = new Post();
    }

    /**
     * @param array $userArray
     * @return mixed
     */
    public function userSave($userArray=[])
    {
        //Guardo un usuario
        return $this->user->create($userArray)->id;;
    }

    /**
     * @param array $postArray
     * @return mixed
     */
    public function postSave($postArray=[])
    {
        //Guardo los posts
        return $this->post->create($postArray)->id;
    }

}