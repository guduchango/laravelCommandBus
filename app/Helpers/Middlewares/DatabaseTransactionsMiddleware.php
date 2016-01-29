<?php
namespace App\Helpers\Middlewares;
use DB;
use League\Tactician\Middleware;
/**
 * Class DatabaseTransactions
 * Run everything with a DB transaction
 * @package Hechoenlaravel\JarvisFoundation\CommandMiddleware
 */
class DatabaseTransactionsMiddleware implements Middleware
{
    /**
     * @param object $command
     * @param callable $next
     * @return null
     */
    public function execute($command, callable $next)
    {
        $pipeline = null;
        DB::transaction(function () use ($next, $command, &$pipeline){
            $pipeline = $next($command);
        });
        return $pipeline;
    }
}