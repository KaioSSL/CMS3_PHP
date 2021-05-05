<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_loginAA = $_REQUEST['loginAA'];
        $_login = $_REQUEST['login'];
        $_senha = $_REQUEST['senha'];
        $_nome = $_REQUEST['nome'];
        $_cpf = $_REQUEST['cpf'];
        $_modoUsuario = $_REQUEST['modoUsuario'];
        $_idIgreja = $_REQUEST['selectIgrejas'];
        $_query = "SELECT * FROM Usuario WHERE login = '$_loginAA'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_dRegistro = $_resultado['dataRegistro'];
        $_query = "DELETE FROM Usuario WHERE login='$_loginAA'";
        $_SQL->sql_query($_query);
        $_query = "INSERT INTO Usuario(nome,cpf,login,senha,dataRegistro,modoUsuario,Igreja_idIgreja) VALUES('$_nome','$_cpf','$_login','$_senha','$_dRegistro',$_modoUsuario,$_idIgreja)";
        $_SQL->sql_query($_query);
        header('location:../html/mainUsuarios.php');
        
        
    }else{
        header('location:../html/mainUsuarios.php');
    }

?>