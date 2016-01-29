<?php

namespace App\Modules\Users\Repositories;

/**
 * Interface UserRepositoryInterface
 * @package App\Modules\Users\Repositories
 */
interface UserRepositoryInterface{

    /**
     * @param array $array
     * @return mixed
     * Guardar un usuario
     */
    public function userSave($array=[]);

    /**
     * @param array $array
     * @return mixed
     * Guardar un post
     */
    public function postSave($array=[]);
}