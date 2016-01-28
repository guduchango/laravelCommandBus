<?php

namespace App\Modules\Users\CommandBus\Middlewares;

use League\Container\Container;
use League\Tactician\Middleware;

class UserRequestMiddleware implements Middleware
{

    public function execute($command, callable $next)
    {
        $request = $command->request;
        $user = $request['data']['attributes'];
        $posts = $request['included'];

        $this->user = $user;
        $this->posts = $posts;

        return $command;
    }

}
