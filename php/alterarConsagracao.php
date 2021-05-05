<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_dConsagracao = $_REQUEST['dConsagracao'];
        $_cargo = $_REQUEST['comboCargos'];
        $_dsc = $_REQUEST['dsc'];
        $_query = "SELECT * FROM Membros WHERE idConsagracao = $_id";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)==0){
            $_query = "UPDATE Consagracao SET dataConsagracao = '$_dConsagracao', cargo = '$_cargo', dsc = '$_dsc' WHERE id = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainConsagracoes.php');
        }else{
            $_query = "UPDATE Membro SET cargo = '$_cargo' WHERE idConsagracao = $_id";
            $_SQL->sql_query($_query);
            $_query = "UPDATE Consagracao SET dataConsagracao = '$_dConsagracao', cargo = '$_cargo', dsc = '$_dsc' WHERE id = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainConsagracoes.php');
        }
    }else{
        header('location:../html/mainConsagracoes.php');
    }
?>