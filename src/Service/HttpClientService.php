<?php


namespace Acme\Service;

use Acme\Service\Contract\HttpClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
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
        Log::info('Attempting ' . $url);
        try {
            $response = $this->client->get(
                $url,
                [
                    'headers' => $headers
                ]
            );
            if ($response->getStatusCode() == 200) {
                Log::info('got response');
                return $response->getBody()->getContents();
            }
            Log::error('Got status code ' . $response->getStatusCode());
            throw new InvalidArgumentException();
        } catch (GuzzleException $e) {
            Log::error('got exception ' . $e->getMessage());
            throw new RuntimeException();
        }
    }

}
