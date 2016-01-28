<?php

namespace App\Modules\CalculateShirtPrice\Repositories;


/**
 * Interface ButtonsRepositoryInterface
 * @package Joselfonseca\Mcs\CalculateShirtPrice\Repositories
 */
interface ButtonsRepositoryInterface
{

    /**
     * get the button price by Sku
     * @param $sku
     * @return float
     */
    public function getButtonPriceBySku($sku);

}
