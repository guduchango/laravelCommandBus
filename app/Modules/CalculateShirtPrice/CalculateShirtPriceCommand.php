<?php

namespace App\Modules\CalculateShirtPrice;


/**
 * Class CalculatePriceShirtCommand
 * @package Joselfonseca\Mcs\CalculateShirtPrice
 */
class CalculateShirtPriceCommand {

    /**
     * Metros de tela
     * @var int
     */
    public $mts;


    /**
     * Referencia de la tela
     * @var
     */
    public $fabricSku;

    /**
     * Cantidad de botones
     * @var int
     */
    public $buttons;

    /**
     * SKU de los botones a usar
     * @var null
     */
    public $buttonsSku;

    /**
     * SKU de la camisa
     * @var null
     */
    public $shirtSku;

    /**
     * @param int $mts
     */
    public function __construct(
        $mts = 0,
        $fabricSku = null,
        $buttons = 8,
        $buttonSku = null,
        $shirtSku = null
    )
    {
        $this->mts = $mts;
        $this->fabricSku = $fabricSku;
        $this->buttons = $buttons;
        $this->buttonSku = $buttonSku;
        $this->shirtSku = $shirtSku;
    }

}
