<?php


namespace Acme\Service\Contract;


use Acme\Model\Profile;

/**
 * Interface StockServiceInterface
 * @package Acme\Service\Contract
 */
interface StockServiceInterface
{

    /**
     * @param string $symbol
     * @return Profile
     */
    public function getProfile(string $symbol): Profile;
}
