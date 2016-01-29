<?php

namespace App\Modules\Users\UserCommandBus\UserMiddlewares;

use League\Tactician\Middleware;
use App\Modules\Users\UserExceptions\UserRequestAttributesEmptyException;

/**
 * Class UserRequestMiddleware
 * @package App\Modules\Users\UserCommandBus\UserMiddlewares
 * Divide el request que viene por post en arrays mas entendibles
 */
class UserRequestMiddleware implements Middleware
{

    /**
     * @param object $command
     * @param callable $next
     * @return mixed
     */
    public function execute($command, callable $next)
    {

        $request = $command->request;
        //Divido los usuarios y los posts
        $user = $request['data']['attributes'];
        $posts = $request['included'];

        if(!$user)
            throw new UserRequestAttributesEmptyException;

        $command->user = $user;
        $command->posts = $posts;

        return $next($command);
    }

}
