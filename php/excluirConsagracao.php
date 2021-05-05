<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Membro WHERE idConsagracao = $_id";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)==0){
            $_query = "DELETE FROM Consagracao WHERE id = $_id ";
            $_SQL->sql_query($_query);
            header('location:../html/mainConsagracoes.php');          
        }else{
            $_query = "UPDATE Membro SET cargo = 'Membro', idConsagracao = NULL WHERE idConsagracao = $_id";
            $_SQL->sql_query($_query);
            $_query = "DELETE FROM Consagracao WHERE id = $_id ";
            $_SQL->sql_query($_query);
            header('location:../html/mainConsagracoes.php');          
        }
    }else{
        header('location:../html/mainConsagracoes.php');
    }
?>