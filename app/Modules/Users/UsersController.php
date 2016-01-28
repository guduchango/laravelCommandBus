<?php

namespace App\Modules\Users;

use Uuid;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use App\Modules\Users\CommandBus\UserCommand;
use App\Modules\Users\CommandBus\UserHandler;
use App\Modules\Users\CommandBus\Middlewares\UserSaveMiddleware;


class UsersController extends Controller
{
    use Helpers;

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
      echo route('api.users.store');
      exit();
        return $this->response->paginator(User::paginate(10), new UserTransformer());
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

      return json_encode("hola");
      /* exit();

      $this->$bus->addHandler(UserCommand::class, UserHandler::class);

      $command = $this->dispatch(
      UserCommand::class,
      [
         'request' => $request
     ],
     [
         UserSaveMiddleware::class
     ]);

      $command = $this->services->bus->dispatch(\Joselfonseca\Mcs\CalculateShirtPrice\CalculateShirtPriceCommand::class, [
         'mts' => 1.5,
         'fabricSku' => 'RET490'
     ], [
         \Joselfonseca\Mcs\CalculateShirtPrice\Middleware\CalculateFabricPrice::class
     ]);
     $this->assertEquals(3750, $command->fabricPrice);

        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($data['password']);
        $data['uuid'] = Uuid::generate(4)->string;
        $user = User::create($data);
        return $this->response->item($user, new UserTransformer());*/
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
