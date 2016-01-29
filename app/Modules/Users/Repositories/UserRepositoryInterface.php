<?php

namespace App\Modules\Users\Repositories;

interface UserRepositoryInterface{

    public function userSave($array=[]);

    public function postSave($array=[]);
}