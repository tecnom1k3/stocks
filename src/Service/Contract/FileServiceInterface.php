<?php


namespace Acme\Service\Contract;


/**
 * Interface FileServiceInterface
 * @package Acme\Service\Contract
 */
interface FileServiceInterface
{
    /**
     * @param string $file
     * @return string
     */
    public function get(string $file): string;

    /**
     * @param string $file
     * @param string $contents
     * @return bool
     */
    public function put(string $file, string $contents): bool;

    /**
     * @param string $file
     * @return bool
     */
    public function exists(string $file): bool;

}
