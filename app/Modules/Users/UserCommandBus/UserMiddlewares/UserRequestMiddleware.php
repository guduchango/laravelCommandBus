<?php

namespace App\Modules\Users\UserCommandBus\UserMiddlewares;

use League\Tactician\Middleware;

class UserRequestMiddleware implements Middleware
{

    public function execute($command, callable $next)
    {
        $request = $command->request;
        $command->user = $request['data']['attributes'];
        $command->posts = $request['included'];

        return $next($command);
    }

}
