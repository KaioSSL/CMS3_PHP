<?php

    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        if(!isset($_SESSION)){
            session_start();
            $_idIgreja = $_SESSION['idIgreja'];
        }else{
            $_idIgreja = $_SESSION['idIgreja'];
        }
        $_SQL = new ConnectionFactory();
        $_cpf = $_REQUEST['comboMembros'];
        $_dsc = $_REQUEST['dsc'];
        $_dDesligamentos = $_REQUEST['dDesligamento'];
        $_query = "INSERT INTO Desligamento(cpf,data,dsc,dataRegistro,idIgreja) VALUES('$_cpf','$_dDesligamentos','$_dsc',curdate(),$_idIgreja)";
        $_SQL->sql_query($_query);
        $_query= "SELECT max(id) as ultimoId FROM Desligamento";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_assoc($_consulta);
        $_id = $_resultado['ultimoId'];
        $_query = "UPDATE Membro SET idDesligamento = $_id, desligado = 1 WHERE cpf = '$_cpf'";
        $_SQL->sql_query($_query);
        header('location:../html/mainDesligamentos.php');
    }else{
        header('location:../html/mainDesligamentos.php');
    }
?>