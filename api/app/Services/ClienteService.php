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

    public function dashboard(Request $request) {
        $movimentos =  $this->repository->countMovimentos();
        $clientes =  $this->repository->countClients();
        $creditos =  $this->repository->countCreditos();
        $debitos =  $this->repository->countDebitos();
        return response()->json(array(
            'total_clientes' => $clientes,
            'total_movimentos' => $movimentos,
            'total_creditos' => $creditos,
            'total_debitos' => $debitos,
        ), 200);
    }
    public function lista(Request $request) {
        $clientes = $this->repository->lista();
        return response()->json($clientes, 200);
    }
    public function detalhe($id, Request $request) {
        $cliente = $this->repository->detalhe($id);
        if($cliente) {
            $movimentos = $this->repository->movimentos($id);
            $cliente->movimentos = $movimentos;
            return response()->json($cliente, 200);
        }
        return response()->json('Not Found', 404);
    }
    public function criar(Request $request) {
        return $this->repository->criar($request->all());
    }
    public function editar($id, Request $request) {
        return $this->repository->editar($id, $request->all());
    }
}
