<?php

namespace App\Repositories;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteRepository
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $model;
    public function __construct(Cliente $_model)
    {
        $this->model = $_model;
    }

    public function lista() {
        return $this->model->all();
    }
    public function detalhe($id) {
        return $this->model->find($id);
    }
    public function movimentos($cliente_id) {
        DB::table('movimento')->where('cliente_id', $cliente_id)->get();
    }
    public function criar($data) {

    }
    public function editar($id, $data) {

    }
}
