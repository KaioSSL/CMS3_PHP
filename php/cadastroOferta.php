<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        $_SQL = new ConnectionFactory();
        $_caixa = $_REQUEST['comboCaixas'];
        $_valor = $_REQUEST['valor'];
        $_dsc = $_REQUEST['dsc'];
        $_query = "SELECT saldo FROM Caixa WHERE idCaixa = $_caixa";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_assoc($_consulta);
        $_saldo = $_resultado['saldo'];
        $_nSaldo = $_saldo + $_valor;
        $_query = "UPDATE Caixa SET Saldo = $_nSaldo WHERE idCaixa = $_caixa";
        $_SQL->sql_query($_query);
        $_query = "INSERT INTO Oferta(idCaixa,valor,dataOferta,dscOferta) VALUES($_caixa,$_valor,curdate(),'$_dsc')";
        $_SQL->sql_query($_query);
        
        header('location:../html/mainOfertas.php');
    }else{
        header('location:../html/mainOfertas.php');
    }
?>