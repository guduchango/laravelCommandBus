<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Model::unguard();

          $this->call('UsersTableSeeder');
          $this->call('PostsTableSeeder');

        Model::reguard();
     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
