<?php


namespace Acme\Service\Contract;


/**
 * Interface HttpClientInterface
 * @package Acme\Service\Contract
 */
interface HttpClientInterface
{
    /**
     * @param string $url
     * @param array $headers
     * @return string
     */
    public function get(string $url, array $headers = []) : string;
}
