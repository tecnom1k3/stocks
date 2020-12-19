<?php


namespace Acme\Service;


use Acme\Model\ModelInterface;
use JsonMapper;
use JsonMapper_Exception;

/**
 * Class JsonMapperService
 * @package Acme\Service
 */
class JsonMapperService implements Contract\JsonMapperServiceInterface
{

    /**
     * @var JsonMapper
     */
    protected JsonMapper $jsonMapper;

    /**
     * JsonMapperService constructor.
     */
    public function __construct()
    {
        $this->jsonMapper = new JsonMapper();
        $this->jsonMapper->bEnforceMapType = false;
        $this->jsonMapper->bIgnoreVisibility = true;
    }

    /**
     * @param array $array
     * @param string $targetClass
     * @return ModelInterface|null
     */
    public function map(array $array, string $targetClass): ?ModelInterface
    {
        try {
            return $this->jsonMapper->map($array, new $targetClass());
        } catch (JsonMapper_Exception $e) {
            return null;
        }
    }

}
