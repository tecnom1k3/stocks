<?php

namespace App\Console\Commands;

use Acme\Model\Symbol;
use Acme\Service\SymbolService;
use App\Jobs\GetSymbolInfoJob;
use Illuminate\Console\Command;

class ProcessSymbols extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'symbol:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetches symbols info';

    /**
     * @var SymbolService
     */
    protected SymbolService $symbolService;

    /**
     * Create a new command instance.
     *
     * @param SymbolService $symbolService
     */
    public function __construct(SymbolService $symbolService)
    {
        parent::__construct();
        $this->symbolService = $symbolService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $symbolCollection = $this->symbolService->listSymbols();

        $symbolCollection->getSymbols()->each(function (Symbol $symbol) {
            dispatch(new GetSymbolInfoJob($symbol->getSymbol()));
        });

        $this->info('processed ' . $symbolCollection->getSymbols()->count() . ' symbols');
    }
}
