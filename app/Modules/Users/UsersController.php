<?php

namespace App\Modules\Users;


use App\Modules\Users\Repositories\UserRepository;
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

    protected $userRepository;

    /**
     * @param CommandBusInterface $bus
     */
    public function __construct(CommandBusInterface $bus){
        $this->bus = $bus;
        $this->userRepository = new UserRepository();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->userAll();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
