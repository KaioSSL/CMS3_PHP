<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_cpf = $_REQUEST['comboMembros'];
        $_dDesligamento = $_REQUEST['dDesligamento'];
        $_dsc = $_REQUEST['dsc'];
        $_query = "UPDATE Desligamento SET cpf = '$_cpf', data = '$_dDesligamento', dsc = '$_dsc' WHERE id = $_id";
        $_SQL->sql_query($_query);
        header('location:../html/mainDesligamentos.php');    
    }else{
        header('location:../html/mainDesligamentos.php');
    }
?>