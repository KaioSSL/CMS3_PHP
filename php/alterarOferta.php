<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_valor = $_REQUEST['valor'];
        $_dsc = $_REQUEST['dsc'];
        $_idCaixa = $_REQUEST['idCaixa'];
        $_valorAntigo = $_REQUEST['valorAntigo'];
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_idCaixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_saldoCaixa = $_resultado['saldo'];
        $_saldoCaixa = $_saldoCaixa - $_valorAntigo + $_valor;
        $_query = "UPDATE Caixa SET saldo = $_saldoCaixa WHERE idCaixa = $_idCaixa";
        $_SQL->sql_query($_query);
        $_query = "UPDATE Oferta SET valor = $_valor, dscOferta = '$_dsc' WHERE idOferta = $_id";
        $_SQL->sql_query($_query);
        header('location:../html/mainOfertas.php');
    }else{
        header('location:../html/mainOfertas.php');
    }
?>