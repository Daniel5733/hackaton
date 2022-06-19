<?php
$res = $db->Consulta("SELECT m.*, p.designacao as producto, c.surname as cliente FROM movimento m, produto p, cliente c WHERE m.produto_id = p.id AND m.cliente_id = c.id limit 10000");
$numTransacoes = mysqli_num_rows($res);
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Transações</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Designação</th>
                        <th>Tipo</th>
                        <th>Producto</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i = 0; $i < $numTransacoes; $i++){
                        $valor = mysqli_fetch_array($res);
                        print "
                    <tr>
                        <td>".$valor['id']."</td>
                        <td>".$valor['designacao']."</td>
                        <td>".$valor['tipo']."</td>
                        <td>".$valor['producto']."</td>
                        <td>".$valor['cliente']."</td>
                        <td>".$valor['valor']."</td>
                        <td>".$valor['data']."</td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>