<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_valor = $_REQUEST['valor'];
        $_dsc = $_REQUEST['dsc'];
        $_data = $_REQUEST['data'];
        
        $_query = "SELECT * FROM Dizimo WHERE idDizimo = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_valorAntigo = $_resultado['valorDizimo'];
        $_idCaixa = $_resultado['idCaixa'];
        
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_idCaixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_saldo = $_resultado['saldo'];
        
        $_saldo = $_saldo - $_valorAntigo + $_valor;
        $_query = "UPDATE Caixa SET saldo = $_saldo WHERE idCaixa = $_idCaixa";
        $_SQL->sql_query($_query);
        
        $_query = "UPDATE Dizimo SET valorDizimo = $_valor, dscDizimo = '$_dsc', dataDizimo = '$_data' WHERE idDizimo = $_id";
        $_SQL->sql_query($_query);
        header('location:../html/mainDizimos.php');
    }else{
        header('location:../html/mainDizimos.php');
    }
?>