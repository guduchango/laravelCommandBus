<?php

namespace App\Modules\CalculateShirtPrice\Repositories;

use App\Modules\CalculateShirtPrice\Exceptions\FabricNotFoundException;

/**
 * Class FabricArrayRepository
 * @package Joselfonseca\Mcs\CalculateShirtPrice\Repositories
 */
class FabricArrayRepository implements FabricRepositoryInterface
{

    /**
     * @var array
     */
    protected $sku = [
        'RET490' => 2500,
        'RET480' => 2000,
        'RET470' => 3000,
    ];


    /**
     * @param $fabricSku
     * @return mixed
     * @throws FabricNotFoundException
     */
    public function getFabricPrice($fabricSku)
    {
        if(isset($this->sku[$fabricSku])){
            return $this->sku[$fabricSku];
        }
        throw new FabricNotFoundException;
    }
}
