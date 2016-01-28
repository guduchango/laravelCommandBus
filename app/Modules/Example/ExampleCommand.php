<?php
namespace App\Modules\Example;

class ExampleCommand {
      public $var1;
      public $var2;

      public function __construct($var1,$var2)
      {
          $this->var1 = 10;
          $this->var2 = 20;
      }
}

?>
