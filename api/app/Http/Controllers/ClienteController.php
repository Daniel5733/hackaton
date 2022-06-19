<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $service;
    public function __construct(ClienteService $_service)
    {
        $this->service = $_service;
    }

    public function dashboard(Request $request) {
        return $this->service->dashboard($request);
    }
    public function lista(Request $request) {
        return $this->service->lista($request);
    }
    public function detalhe($id, Request $request) {
        return $this->service->detalhe($id, $request);
    }
    public function criar(Request $request) {
        return $this->service->criar($request);
    }
    public function editar($id, Request $request) {
        return $this->service->editar($id, $request);
    }
}
