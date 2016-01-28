<?php

namespace App\Modules\Users\CommandBus;

use App\User;

class UserCommand {

  public $request = [];

  public $user = [];

  public $posts = [];

    public function __construct($request = [])
    {
        $this->request = $request;
    }


}
