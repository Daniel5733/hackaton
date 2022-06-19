<?php

namespace App\Services;
use Symfony\Component\HttpFoundation\Request;
use App\Repositories\ClienteRepository;
class ClienteService
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $repository;
    public function __construct(ClienteRepository $_repository)
    {
        $this->repository = $_repository;
    }

    public function lista(Request $request) {
        $clientes = $this->repository->lista();
        return response()->json($clientes, 200);
    }
    public function detalhe($id, Request $request) {
        $cliente = $this->repository->detalhe($id);
        $cliente->movimentos = $this->repository->movimentos($id);
        return response()->json($cliente, 200);
    }
    public function criar(Request $request) {
        return $this->repository->criar($request->all());
    }
    public function editar($id, Request $request) {
        return $this->repository->editar($id, $request->all());
    }
}
