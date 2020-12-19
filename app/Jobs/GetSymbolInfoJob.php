<?php

namespace App\Jobs;

use Acme\Service\Contract\FileServiceInterface;
use Acme\Service\Contract\StockServiceInterface;
use Illuminate\Contracts\Redis\LimiterTimeoutException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

/**
 * Class GetSymbolInfoJob
 * @package App\Jobs
 */
class GetSymbolInfoJob extends Job
{

    /**
     * @var string
     */
    protected string $symbol;

    /**
     * Create a new job instance.
     *
     * @param string $symbol
     */
    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * Execute the job.
     *
     * @param StockServiceInterface $stockService
     * @param FileServiceInterface $fileService
     * @return void
     * @throws LimiterTimeoutException
     */
    public function handle(StockServiceInterface $stockService, FileServiceInterface $fileService)
    {
        Log::info('going to process symbol ' . $this->symbol);
        Redis::throttle('symbolProfile')->allow(1)->every(1)->then(
            function () use ($stockService, $fileService) {
                Log::info('processing ' . $this->symbol);
                $profile = $stockService->getProfile($this->symbol);
                Log::info('saving ' . $this->symbol);
                $fileService->put('profiles/'.$this->symbol.'.json', json_encode($profile));
            },
            function () {
                $this->release(10);
            }
        );
    }
}
