<?php 

    $host = "localhost";
    $user = 'root';
    $pass = '';
    $database = 'hackaton';
    $port = '3307';
    
    $con = mysqli_connect($host, $user, $pass, $database, $port);


    mysqli_query($con, "CREATE SCHEMA IF NOT EXISTS `hackaton` DEFAULT CHARACTER SET utf8 ;
    USE `hackaton` ;");

    mysqli_query($con, "DROP TABLE IF EXISTS `hackaton`.`produto` ;");

    mysqli_query($con, "CREATE TABLE IF NOT EXISTS `hackaton`.`produto` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `designacao` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`))
      ENGINE = InnoDB;");

mysqli_query($con, " DROP TABLE IF EXISTS `hackaton`.`cliente`;");
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `hackaton`.`cliente` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `Surname` VARCHAR(255) NOT NULL,
    `CreditScore` INT NOT NULL,
    `Geography` VARCHAR(100) NOT NULL,
    `Gender` VARCHAR(100) NOT NULL,
    `DateOfBirth` DATE NOT NULL,
    `OpenAccountDate` Date NOT NULL,
    `CurrentAccountNumber` VARCHAR(255) NOT NULL,
    `CreditCardAccountNumber` VARCHAR(255) NOT NULL,
    `Balance` DECIMAL(12,2) NOT NULL,
    `BalanceDate` Date NOT NULL,
    `EstimatedSalary` DECIMAL(12,2) NOT NULL,
    PRIMARY KEY (`id`))
  ENGINE = InnoDB;");
    mysqli_query($con, "DROP TABLE IF EXISTS `hackaton`.`movimento` ;");

    mysqli_query($con, "CREATE TABLE IF NOT EXISTS `hackaton`.`movimento` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `designacao` VARCHAR(255) NOT NULL,
        `tipo` VARCHAR(100) NOT NULL,
        `produto_id` INT NOT NULL,
        `cliente_id` INT NOT NULL,
        `valor` DECIMAL(12,2) NOT NULL,
        `saldo_poisMovimento` DECIMAL(12,2) NOT NULL,
        `data` Date NOT NULL,
        PRIMARY KEY (`id`))
      ENGINE = InnoDB;");

    

    
    $produtos_csv = glob('Produtos.csv', GLOB_BRACE);
    if (($handle = fopen ($produtos_csv[0], 'r' )) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ',' )) !== FALSE ) {
            //print_r($data);die();
            $sql_p = "INSERT INTO produto(id,designacao)VALUES(".$data[0].",'".$data[1]."')";
            mysqli_query($con, $sql_p);
        }
        print 'Done Produtos => ';
    }
     $clientes_csv = glob('Clientes.csv', GLOB_BRACE);
    if (($handle = fopen ($clientes_csv[0], 'r' )) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ',' )) !== FALSE ) {
            //print_r($data);die();
            $d1 = DateTime::createFromFormat('m/d/Y', $data[6])->format('Y-m-d');
            $d2 = DateTime::createFromFormat('m/d/Y', $data[7])->format('Y-m-d');
            $d3 = DateTime::createFromFormat('m/d/Y', $data[11])->format('Y-m-d');
            $sql_p = "INSERT INTO cliente(id,Surname,CreditScore,Geography,Gender,DateOfBirth,OpenAccountDate,CurrentAccountNumber,CreditCardAccountNumber,Balance,BalanceDate,EstimatedSalary)VALUES(".$data[1].",'".escape($data[2])."','".$data[3]."','".$data[4]."','".$data[5]."','".$d1."','".$d2."','".$data[8]."','".$data[9]."','".$data[10]."','".$d3."','".$data[12]."');";
            mysqli_query($con, $sql_p);
        }
        print 'Done Clientes';
    }
    $movimentos_csv = glob('Movimentos.csv', GLOB_BRACE);
    if (($handle = fopen ($movimentos_csv[0], 'r' )) !== FALSE) {
        while (($data = fgetcsv($handle, 10000000, ',' )) !== FALSE ) {
            $resCliente = "SELECT *FROM cliente WHERE id = ".$data[3];
            $sqlresult = mysqli_result($con, $resCliente);
            $valor = mysqli_fetch_array($resCliente);
            //print_r($data);die();
            $sql_p = "INSERT INTO movimento(id,designacao,tipo,produto_id,cliente_id,valor,saldo_poisMovimento,data)VALUES(".$data[0].",'".escape($data[1])."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."');";
            mysqli_query($con, $sql_p);
        }

print 'Done Movimentos => ';
    }
    mysqli_close($con);
    //$movimentos= glob('Produtos.csv', GLOB_BRACE);
    //$clientes = glob('Produtos.csv', GLOB_BRACE);


	function escape($value) {
		return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
	}
?>