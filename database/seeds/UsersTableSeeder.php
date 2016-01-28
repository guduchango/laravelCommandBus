<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $objects = factory(User::class,5)->make();
       foreach($objects as $var)
        {
            User::create($var->toArray());
        }
    }
}
