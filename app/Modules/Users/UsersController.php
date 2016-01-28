<?php

namespace App\Modules\Users;

use Uuid;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use App\Modules\Users\CommandBus\UserCommand;
use App\Modules\Users\CommandBus\UserHandler;
use App\Modules\Users\CommandBus\Middlewares\UserSaveMiddleware;
use App\Modules\Users\CommandBus\Middlewares\UserRequestMiddleware;

class UsersController extends Controller
{
    protected $bus;

    public function __construct(CommandBusInterface $bus){
        $this->bus = $bus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users= User::all();
      return response()->json($users,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request = $request->all();

      $this->bus->addHandler(UserCommand::class, UserHandler::class);


      $command = $this->bus->dispatch(
        UserCommand::class,
          [
           'request' => $request
         ],
         [
           UserRequestMiddleware::class
         ]
       );

       print_r($command->user);
       exit();

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
