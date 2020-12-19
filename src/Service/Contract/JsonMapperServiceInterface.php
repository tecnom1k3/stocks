<?php


namespace Acme\Service\Contract;


use Acme\Model\ModelInterface;

/**
 * Interface JsonMapperServiceInterface
 * @package Acme\Service\Contract
 */
interface JsonMapperServiceInterface
{

    /**
     * @param array $array
     * @param string $targetClass
     * @return ModelInterface|null
     */
    public function map(array $array, string $targetClass): ?ModelInterface;
}
