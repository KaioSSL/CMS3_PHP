<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        
        $_SQL = new ConnectionFactory();
        $_valor = $_REQUEST['valor'];
        $_data = $_REQUEST['data'];
        $_dsc = $_REQUEST['dsc'];
        $_idCaixa = $_REQUEST['comboCaixas'];
        
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_idCaixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_saldo = $_resultado['saldo'];
        $_saldo = $_saldo - $_valor;
        $_query = "UPDATE Caixa SET saldo = $_saldo WHERE idCaixa = $_idCaixa";
        $_SQL->sql_query($_query);
        
        $_query = "INSERT INTO Despesa(valorDespesa,dscDespesa,dataDespesa,idCaixa) VALUES($_valor,'$_dsc','$_data',$_idCaixa)";
        $_SQL->sql_query($_query);
        
        header('location:../html/mainDespesas.php');
        
    }else{
        header('location:../html/mainDespesas.php');
    }
?>