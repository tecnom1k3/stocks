<?php

namespace App\Console\Commands;

use Acme\Service\SymbolService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class GetSymbol extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'symbol:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve list of symbols';

    protected SymbolService $symbolService;

    /**
     * Create a new command instance.
     *
     * @param SymbolService $symbolService
     */
    public function __construct(SymbolService $symbolService)
    {
        $this->symbolService = $symbolService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function handle()
    {
        $result = $this->symbolService->getSymbols();
        $this->info('Finished with status ' . $result);
    }
}
