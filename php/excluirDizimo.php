<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Dizimo WHERE idDizimo = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_valor = $_resultado['valorDizimo'];
        $_caixa = $_resultado['idCaixa'];
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_caixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_saldo = $_resultado['saldo'];
        $_saldo = $_saldo - $_valor;
        $_query = "UPDATE Caixa SET saldo = $_saldo WHERE idCaixa = $_caixa";
        $_SQL->sql_query($_query);
        
        $_query = "DELETE FROM Dizimo WHERE idDizimo = $_id";
        $_SQL->sql_query($_query);
        header('location:../html/mainDizimos.php');
    }else{
        header('location:../html/mainDizimos.php');
    }

?>
