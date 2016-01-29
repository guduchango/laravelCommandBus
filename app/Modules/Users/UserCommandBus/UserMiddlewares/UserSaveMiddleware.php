<?php

namespace App\Modules\Users\UserCommandBus\UserMiddlewares;

use League\Tactician\Middleware;
use App\Modules\Users\Repositories\UserRepositoryInterface;

class UserSaveMiddleware implements Middleware
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($command, callable $next)
    {
        $userArray = $command->user;

        $user_id = $this->userRepository->userSave($userArray);

        return $next($command);

    }

}
