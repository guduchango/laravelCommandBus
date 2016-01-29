<?php

namespace App\Modules\Users\UserCommandBus\UserMiddlewares;

use League\Tactician\Middleware;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use Uuid;

/**
 * Class UserSaveMiddleware
 * @package App\Modules\Users\UserCommandBus\UserMiddlewares
 * Sirve para guardar el User y los Post que dependen de este al mismo tiempo
 */
class UserSaveMiddleware implements Middleware
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        //Llamo al repo del modulo user
        $this->userRepository = $userRepository;
    }

    /**
     * @param object $command
     * @param callable $next
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        //Formo los arrays para poder trabajar con ellos
        $postsArray= $command->posts;
        $userArray = $command->user;

        //Genero el uuid
        $userArray['uuid']= Uuid::generate(4)->string;

        //Guardo el usuario y devuelvo el id
        $user_id = $this->userRepository->userSave($userArray);


        if(!$postsArray)
        {
            foreach($postsArray as $var)
            {
                //Guardo todos los posts
                $postArray = $var['attributes'];
                //Agrego el user_id en el array con el user_id que acabo de guardar
                $postArray['user_id'] = $user_id;
                //Genero el uuid
                $postArray['uuid'] = Uuid::generate(4)->string;

                $this->userRepository->postSave($postArray);
            }
        }

        return $next($command);
    }

}
