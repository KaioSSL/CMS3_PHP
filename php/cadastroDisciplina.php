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
        $_dInicio = $_REQUEST['dInicio'];
        $_dFim = $_REQUEST['dFim'];
        $_dsc = $_REQUEST['dsc'];
        $_query = "INSERT INTO Disciplina(cpf,dataInicio,dataFim,dsc,idIgreja) VALUES('$_cpf','$_dInicio','$_dFim','$_dsc',$_idIgreja)";
        $_SQL->sql_query($_query);
        $_query = "SELECT max(id) AS ultimoId FROM Disciplina";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_assoc($_consulta);
        $_id = $_resultado['ultimoId'];
        $_query = "UPDATE Membro SET disciplinado = 1,idDisciplina = $_id  WHERE cpf = '$_cpf'";
        $_SQL->sql_query($_query);
        header('location:../html/mainDisciplinas.php');
    }else{
        header('location:../html/mainDisciplinas.php');
    }

?>