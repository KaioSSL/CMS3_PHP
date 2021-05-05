<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_valor = $_REQUEST['valor'];
        $_dsc = $_REQUEST['dsc'];
        $_data = $_REQUEST['data'];
        
        $_query = "SELECT * FROM Despesa WHERE idDespesa = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_idCaixa = $_resultado['idCaixa'];
        $_valorAntigo = $_resultado['valorDespesa'];
        
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_idCaixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_saldo = $_resultado['saldo'];
        $_saldo = $_saldo - $_valor + $_valorAntigo;
        
        $_query = "UPDATE Caixa SET saldo = $_saldo WHERE idCaixa = $_idCaixa";
        $_SQL->sql_query($_query);
        
        $_query = "UPDATE Despesa SET valorDespesa = $_valor, dscDespesa = '$_dsc',dataDespesa = '$_data' WHERE idDespesa = $_id";
        $_SQL->sql_query($_query);
        
        header('location:../html/mainDespesas.php');
    }else{
        header('location:../html/mainDespesas.php');
    }

?>