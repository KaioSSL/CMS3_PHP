<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_dInicio = $_REQUEST['dInicio'];
        $_dFim = $_REQUEST['dFim'];
        $_dsc = $_REQUEST['dsc'];
        $_query = "UPDATE Disciplina SET dsc = '$_dsc',dataInicio = '$_dInicio', dataFim = '$_dFim' WHERE id = '$_id'";
        $_SQL->sql_query($_query);
        header('location:../html/mainDisciplinas.php');
    }else{
        header('location:../html/mainDisciplinas.php');
    }
?>