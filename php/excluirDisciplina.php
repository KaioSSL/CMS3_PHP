<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Membro WHERE idDisciplina = $_id";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)==0){
            $_query = "DELETE FROM Disciplina WHERE id = $_id";
            $_SQL->sql_Query($_query);
            header('location:../html/mainDisciplinas.php');
        }else{
            $_query = "UPDATE Membro SET disciplinado = 0, idDisciplina = NULL WHERE idDisciplina = $_id";
            $_SQL->sql_query($_query);
            $_query = "DELETE FROM Disciplina WHERE id = $_id";
            $_SQL->sql_Query($_query);
            header('location:../html/mainDisciplinas.php');
        }
    }else{
        header('location:../html/mainDisciplinas.php');
    }
?>