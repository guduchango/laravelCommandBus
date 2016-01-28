<?php

namespace App\Modules\Users\CommandBus\Middlewares;

use League\Tactician\Middleware;

class UserRequestMiddleware implements Middleware
{

    public function execute($command, callable $next)
    {
        $request = $command->request;
        $user = $request['data']['attributes'];
        $posts = $request['included'];

        $command->user = $user;
        $command->posts = $posts;

        return $next($command);
    }

}
