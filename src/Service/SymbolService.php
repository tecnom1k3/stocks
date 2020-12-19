<?php


namespace Acme\Service;


use Acme\Model\SymbolCollection;
use Acme\Service\Contract\FileServiceInterface;
use Acme\Service\Contract\HttpClientInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class SymbolService
 * @package Acme\Service
 */
class SymbolService
{
    /**
     *
     */
    const SYMBOL_FILE = 'symbols.json';

    /**
     *
     */
    const URL = 'https://finnhub.io/api/v1/stock/symbol?exchange=US';

    /**
     * @var HttpClientInterface
     */
    protected HttpClientInterface  $httpClientService;

    /**
     * @var FileServiceInterface
     */
    protected FileServiceInterface $fileService;

    /**
     * SymbolService constructor.
     * @param HttpClientInterface $client
     * @param FileServiceInterface $fileService
     */
    public function __construct(HttpClientInterface $client, FileServiceInterface $fileService)
    {
        $this->httpClientService = $client;
        $this->fileService = $fileService;
    }

    /**
     * @return SymbolCollection
     */
    public function listSymbols(): SymbolCollection
    {
        $symbolsFileContents = '[]';

        $symbolFile = env('SYMBOL_FILE', self::SYMBOL_FILE);

        if ($this->fileService->exists($symbolFile)) {
            $symbolsFileContents = $this->fileService->get($symbolFile);
        }

        return SymbolCollection::fromArray(json_decode($symbolsFileContents, true));
    }

    /**
     * @return bool
     */
    public function getSymbols(): bool
    {
        Log::info('Fetching symbols from ' . self::URL);
        $res = $this->httpClientService->get(self::URL, ['X-Finnhub-Token' => env('FINNHUB_TOKEN')]);
        Log::info('Got response, saving...');
        return $this->fileService->put(env('SYMBOL_FILE', self::SYMBOL_FILE), $res);
    }

}
