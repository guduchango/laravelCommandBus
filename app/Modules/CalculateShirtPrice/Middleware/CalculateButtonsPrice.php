<?php

namespace  App\Modules\CalculateShirtPrice\Middleware;

use League\Container\Container;
use League\Tactician\Middleware;
use App\Modules\CalculateShirtPrice\Repositories\ButtonsRepositoryInterface;

/**
 * Class CalculateButtonsPrice
 * @package Joselfonseca\Mcs\CalculateShirtPrice\Middleware
 */
class CalculateButtonsPrice implements Middleware
{

    /**
     * button price
     * @var int
     */
    protected $buttonPrice = 0;

    /**
     * DI Container
     * @var
     */
    protected $container;

    /**
     * Buttons repository
     * @var
     */
    protected $repository;

    /**
     * CalculateButtonsPrice constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->repository = $this->container->get(ButtonsRepositoryInterface::class);
    }

    /**
     * Calculate buttons price using repository
     * @param object $command
     * @param callable $next
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $this->getButtonPriceFromRepository($command);
        $command->buttonsPrice = $command->buttons * $this->buttonPrice;
        return $next($command);
    }

    /**
     * Get button price from repository
     * @param $command
     */
    protected function getButtonPriceFromRepository($command)
    {
        $this->buttonPrice = $this->repository->getButtonPriceBySku($command->buttonSku);
    }
}
