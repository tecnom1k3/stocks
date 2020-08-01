<?php

namespace App\Http\Controllers;

use Acme\Service\SymbolService;
use Exception;
use Illuminate\Http\JsonResponse;

use function response;

class SymbolController extends Controller
{

    /**
     * @var SymbolService
     */
    private SymbolService $symbolService;

    /**
     * SymbolController constructor.
     * @param SymbolService $symbolService
     */
    public function __construct(SymbolService $symbolService)
    {
        $this->symbolService = $symbolService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function index()
    {
        return response()->json($this->symbolService->listSymbols()->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return response()->json([]);
    }

}
