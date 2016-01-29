<?php

namespace App\Modules\Users\UserCommandBus;

use App\User;

/**
 * Class UserCommand
 * @package App\Modules\Users\UserCommandBus
 */
class UserCommand {


  /**
   * @var recibe lo que viene por post
   */
  public $request = [];

  /**
   * @var array con los datos de usuer para guardar
   */
  public $user = [];

  /**
   * @var array de posts que se van a guardar
   */
  public $posts = [];

  /**
   * @var respuesta final que se devolvera
   */
  public $response = [];

  /**
   * @param array $request
   * Parametro que le paso al dispatch del command bus
   */
  public function __construct($request = [])
  {
      $this->request = $request;
  }


}
