<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['login'])){
        $_SQL = new ConnectionFactory();
        $_login = $_REQUEST['login'];
        $_query = "DELETE FROM Usuario WHERE login = '$_login'";
        $_SQL->sql_query($_query);
        echo "<script>location.href='../html/mainUsuarios.php';
            alert('Usuario excluído com Sucesso');</script>";
    }else{
        header('location:../html/mainUsuarios.php');
    }
?>