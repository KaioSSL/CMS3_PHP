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
        $_dConsagracao = $_REQUEST['dConsagracao'];
        $_cargo = $_REQUEST['comboCargos'];
        $_dsc = $_REQUEST['dsc'];
        $_query = "INSERT INTO Consagracao(cpf,dataConsagracao,cargo,dsc,dataRegistro,idIgreja) VALUES ('$_cpf','$_dConsagracao','$_cargo','$_dsc',curdate(),$_idIgreja)";
        $_SQL->sql_query($_query);
        $_query = "SELECT max(id) as ultimoId FROM Consagracao";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_assoc($_consulta);
        $_id = $_resultado['ultimoId'];
        $_query = "UPDATE Membro SET cargo = '$_cargo',idConsagracao = $_id WHERE cpf = '$_cpf'";
        $_SQL->sql_query($_query);
        header('location:../html/mainConsagracoes.php');
    }else{
        header('location:../html/mainConsagracoes.php');
        
    }
?>