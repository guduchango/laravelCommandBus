<?php

namespace App\Modules\CalculateShirtPrice\Repositories;


use Joselfonseca\Mcs\CalculateShirtPrice\Exceptions\ManufactureCostNotFoundException;

class ManufactureCostArrayRepository implements ManufactureRepositoryInterface
{

    protected $costs = [
        'SKU909' => [
            'manufacture' => 2500,
            'cut' => 500
        ],
        'COP567' => [
            'manufacture' => 2500,
            'cut' => 500
        ]
    ];

    public function getManufactureCost($sku)
    {
        if(!isset($this->costs[$sku]))
        {
            throw new ManufactureCostNotFoundException();
        }
        return $this->costs[$sku]['manufacture'];
    }

    public function getCutCost($sku)
    {
        if(!isset($this->costs[$sku]))
        {
            throw new ManufactureCostNotFoundException();
        }
        return $this->costs[$sku]['cut'];
    }
}
