<?php

namespace App\Modules\Users\CommandBus;

use App\User;

class UserCommand {

  protected $request = [];

  protected $user = [];

  protected $posts = [];

    public function __construct($request = [])
    {
        $this->request = $request;
    }

}
