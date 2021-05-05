<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        if(!($_REQUEST['nome']=='Principal')){
            $_SQL = new ConnectionFactory();
            $_id = $_REQUEST['id'];
            $_nome = $_REQUEST['nome'];
            $_dsc = $_REQUEST['dsc'];
            $_query = "UPDATE Setores SET nomeSe = '$_nome', dscSe='$_dsc' WHERE id = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainSetores.php');
        }else{
            header('location:../html/mainSetores.php');
        }
    }else{
        header('location:../html/mainSetores.php');
    }
?>