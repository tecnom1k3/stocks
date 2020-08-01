<?php


namespace Acme\Service;

use Acme\Service\Contract\HttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use RuntimeException;


/**
 * Class HttpClient
 * @package Acme\Service
 */
class HttpClientService implements HttpClientInterface
{

    /**
     * @var Client
     */
    protected Client $client;

    /**
     * HttpClient constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param array $headers
     * @return string
     */
    public function get(string $url, array $headers = []) : string
    {
        try {
            $response = $this->client->get(
                $url,
                [
                    'headers' => $headers
                ]
            );
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            }
            throw new InvalidArgumentException();
        } catch (GuzzleException $e) {
            throw new RuntimeException();
        }
    }

}
