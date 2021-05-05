<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        
        $_query = "SELECT * FROM Despesa WHERE idDespesa = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_idCaixa = $_resultado['idCaixa'];
        $_valor = $_resultado['valorDespesa'];
        
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_idCaixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_saldo = $_resultado['saldo'];
        $_saldo = $_saldo + $_valor;
        
        $_query = "UPDATE Caixa SET saldo = $_saldo WHERE idCaixa = $_idCaixa";
        $_SQL->sql_query($_query);
        
        $_query = "DELETE FROM Despesa WHERE idDespesa = $_id";
        $_SQL->sql_query($_query);
        header('location:../html/mainDespesas.php');
    
    }else{
        header('location:../html/mainDespesas.php');
    }

?>