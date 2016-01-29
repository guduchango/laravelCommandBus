<?php

namespace App\Modules\Users;

use Uuid;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use App\Modules\Users\UserCommandBus\UserCommand;
use App\Modules\Users\UserCommandBus\UserHandler;
use App\Modules\Users\UserCommandBus\UserMiddlewares\UserSaveMiddleware;
use App\Modules\Users\UserCommandBus\UserMiddlewares\UserRequestMiddleware;
use App\Modules\Users\UserCommandBus\UserMiddlewares\UserResponseMiddleware;
use App\Helpers\Middlewares\DatabaseTransactionsMiddleware;

/**
 * Class UsersController
 * @package App\Modules\Users
 */
class UsersController extends Controller
{
    /**
     * @var CommandBusInterface
     */
    protected $bus;

    /**
     * @param CommandBusInterface $bus
     */
    public function __construct(CommandBusInterface $bus){
        $this->bus = $bus;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Convierto lo que viene del request a array
        $request = $request->all();

        //Lllamo al bus para unir el commando con el handle
        $this->bus->addHandler(UserCommand::class, UserHandler::class);

        //Disparo el bus
        $command = $this->bus->dispatch(
        UserCommand::class,
        [
           'request' => $request
        ],
        [
            UserRequestMiddleware::class,//Convierto el request a valores entendibles
            DatabaseTransactionsMiddleware::class,//Empieza transaccion
            UserSaveMiddleware::class,//Guardo el usuario y los posts que vienen en request
            UserResponseMiddleware::class//Armo la respuesta para devolver
        ]
       );

        return response()->json($command->response,201);
    }

}
