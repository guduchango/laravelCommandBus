<?php

namespace App\Modules\Users\UserCommandBus\UserMiddlewares;

use League\Tactician\Middleware;

/**
 * Class UserResponseMiddleware
 * @package App\Modules\Users\UserCommandBus\UserMiddlewares
 * Sirve para modelara la respuesta que dara la peticion
 */
class UserResponseMiddleware implements Middleware
{

    /**
     * @param object $command
     * @param callable $next
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        //Armo respuesta
        $command->response = ['status'=>'success'];

        return $next($command);
    }

}
