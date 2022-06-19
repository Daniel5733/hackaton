<?php


class conexao {
    var $host = "localhost";
    var $user = "root";
    var $senha = "";
    var $dbase = "hackaton";
    var $port = "3307";
    var $query;
    var $link;
    var $resultado;

    function conecta() {
        $this->link = @mysqli_connect($this->host, $this->user, $this->senha, $this->dbase, $this->port);
        if (@mysqli_connect_error()) {
            print "Ocorreu um Erro na Conex�o MySQL:";
            die();
        } else if (!mysqli_select_db($this->link, $this->dbase)) {
            print "Ocorreu um Erro ao selecionar o Banco d Dados: ";
            die();
        }
    }

//fim do metodo conecta

    function consulta($query) {
        $this->conecta();
        $this->query = $query;

        if ($this->resultado = mysqli_query($this->link, $this->query)) {
            $this->desconecta();
            return $this->resultado;
        } else {
            print "Ocorreu Um erro ao executar a Query :<b>$query</b>";
            print "Erro: <b>" . mysqli_error($this->link) . "</b>";
            die();
            $this->desconecta();
        }
    }

    function desconecta() {
        return mysqli_close($this->link);
    }

}
