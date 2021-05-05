<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        $_SQL = new ConnectionFactory();
        $_valor = $_REQUEST['valor'];
        $_dataP = $_REQUEST['dataP'];
        $_cpf = $_REQUEST['comboMembros'];
        $_dsc = $_REQUEST['dsc'];
        $_idIgreja = $_SESSION['idIgreja'];
        $_query = "SELECT * FROM Caixa,Setores WHERE Setores.idIgreja = $_idIgreja AND Caixa.idSetor = Setores.idSetor AND Caixa.nomeCx='Principal'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_idCaixa = $_resultado['idCaixa'];
        $_saldo = $_resultado['saldo'];
        $_saldo = $_saldo + $_valor;
        $_query = "UPDATE Caixa SET saldo = $_saldo WHERE idCaixa = $_idCaixa";
        $_SQL->sql_query($_query);
        $_query = "INSERT INTO Dizimo(valorDizimo,dataDizimo,idCaixa,cpfMembro,dscDizimo) VALUES($_valor,'$_dataP',$_idCaixa,'$_cpf','$_dsc')";
        $_SQL->sql_query($_query);
        header('location:../html/mainDizimos.php');
    }else{
        header('location:../html/mainDizimos.php');
    }
?>