<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Membro WHERE idDesligamento = $_id";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)==0){
            $_query = "DELETE FROM Desligamento WHERE id = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainDesligamentos.php');           
        }else{
            $_query = "UPDATE Membro SET idDesligamento = NULL, desligado = 0 WHERE idDesligamento = $_id";
            $_SQL->sql_query($_query);
            $_query = "DELETE FROM Desligamento WHERE id = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainDesligamentos.php');
        }
        
    }else{
        header('location:../html/mainDesligamentos.php');
    }

?>