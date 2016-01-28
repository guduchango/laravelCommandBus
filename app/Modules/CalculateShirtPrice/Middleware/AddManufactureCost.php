<?php

namespace  App\Modules\CalculateShirtPrice\Middleware;

use League\Container\Container;
use League\Tactician\Middleware;
use App\Modules\CalculateShirtPrice\Repositories\ManufactureRepositoryInterface;

class AddManufactureCost implements Middleware
{

    protected $manufactureCost = 2500;
    protected $cutCost = 500;
    protected $container;
    protected $repository;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->repository = $this->container->get(ManufactureRepositoryInterface::class);
    }

    public function execute($command, callable $next)
    {
        $this->getManufactureCost($command)->getCutCost($command);
        $command->manufactureCost = $this->manufactureCost;
        $command->cutCost = $this->cutCost;
        return $command;
    }

    protected function getManufactureCost($command)
    {
        $this->manufactureCost = $this->repository->getManufactureCost($command->shirtSku);
        return $this;
    }

    protected function getCutCost($command)
    {
        $this->cutCost = $this->repository->getCutCost($command->shirtSku);
        return $this;
    }
}
