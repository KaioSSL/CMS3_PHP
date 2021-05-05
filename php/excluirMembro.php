<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cpf'])){
        $_cpf = $_REQUEST['cpf'];
        $_SQL = new ConnectionFactory();
        $_query = "DELETE FROM Membro WHERE cpf = '$_cpf'";
        $_SQL->sql_query($_query);
        echo "<script>location.href='../html/mainMembros.php';
            alert('Excluído com Sucesso');</script>";
    }else{
        header('location:../html/mainMembros.php');
    }
?>