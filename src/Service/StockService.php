<?php


namespace Acme\Service;


use Acme\Model\Profile;
use Acme\Service\Contract\HttpClientInterface;
use JsonMapper;
use JsonMapper_Exception;

/**
 * Class StockService
 * @package Acme\Service
 */
class StockService implements Contract\StockServiceInterface
{

    /**
     *
     */
    const SYMBOL_PROFILE_URL = 'https://finnhub.io/api/v1/stock/profile2?symbol=';

    /**
     * @var HttpClientInterface
     */
    protected HttpClientInterface $httpClient;

    /**
     * @var JsonMapper
     */
    protected JsonMapper $jsonMapper;

    /**
     * StockService constructor.
     * @param HttpClientInterface $httpClient
     * @param JsonMapper $jsonMapper
     */
    public function __construct(HttpClientInterface $httpClient, JsonMapper $jsonMapper)
    {
        $this->httpClient = $httpClient;
        $this->jsonMapper = $jsonMapper;
    }

    /**
     * @param string $symbol
     * @return Profile
     * @throws JsonMapper_Exception
     */
    public function getProfile(string $symbol) : Profile
    {
        $data = $this->httpClient->get(self::SYMBOL_PROFILE_URL . $symbol, [
            'X-Finnhub-Token' => env('FINNHUB_TOKEN')
        ]);

        $json = json_decode($data);

        return $this->jsonMapper->map($json, new Profile());
    }

}
