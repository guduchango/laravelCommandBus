<?php

namespace App\Modules\CalculateShirtPrice\Repositories;


/**
 * Interface ManufactureRepositoryInterface
 * @package Joselfonseca\Mcs\CalculateShirtPrice\Repositories
 */
interface ManufactureRepositoryInterface
{

    /**
     * get Manufacture Cost
     * @param $sku
     * @return mixed
     */
    public function getManufactureCost($sku);

    /**
     * get Cut cost
     * @param $sku
     * @return mixed
     */
    public function getCutCost($sku);

}
