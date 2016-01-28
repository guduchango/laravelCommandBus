<?php

namespace  App\Modules\CalculateShirtPrice\Middleware;

use League\Tactician\Middleware;
use App\Modules\CalculateShirtPrice\Repositories\FabricRepositoryInterface;

/**
 * Class CalculateFabricPrice
 * @package Joselfonseca\Mcs\CalculateShirtPrice\Middleware
 */
class CalculateFabricPrice implements Middleware{


    /**
     * Precio de la tela del fabricante
     * @var
     */
    protected $fabricVendorPrice;
    /**
     * Contenedor de dependencias
     * @var
     */
    protected $container;


    /**
     * CalculateFabricPrice constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Obtener el precio de la tela por fabrica usando el repositorio
     * @param $command
     */
    protected function getFabricVendorPrice($command)
    {
        $repository = $this->container->get(FabricRepositoryInterface::class);
        $this->fabricVendorPrice = $repository->getFabricPrice($command->fabricSku);
    }


    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $this->getFabricVendorPrice($command);
        $command->fabricPrice = $this->fabricVendorPrice * $command->mts;
        return $next($command);
    }
}
