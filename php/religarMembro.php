<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Membro WHERE idDesligamento = $_id";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)==0){
            echo "<script>location.href='../html/mainDesligamentos.php';alert('Não há Membro com Esse ID Desligado');</script>";
        }else{
            $_query = "UPDATE Membro SET desligado = 0, idDesligamento = NULL WHERE idDesligamento = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainDesligamentos.php');
        }
        
    }else{
        header('location:../html/mainDesligamentos.php');
    }
?>