<?php

namespace App\Schemas;

use \Neomerx\JsonApi\Schema\SchemaProvider;

/**
 * @package Neomerx\LimoncelloCollins
 */
class UserSchema extends SchemaProvider
{
    protected $resourceType = 'users';

    public function getId($obj){
        return $obj->uuid;
    }

    public function getAttributes($obj){
        return [
            'name' => $obj->name,
            'email' => $obj->email,
        ];
    }

}
