<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        $_SQL = new ConnectionFactory();
        $_nome = $_REQUEST['nome'];
        $_cpf = $_REQUEST['cpf'];
        $_login = $_REQUEST['login'];
        $_senha = $_REQUEST['senha'];
        $_modoUsuario = $_REQUEST['modoUsuario'];
        $_idIgreja = $_REQUEST['selectIgrejas'];
        $_query = "SELECT * FROM Usuario WHERE login = '$_login'";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)>0){
            echo "<script>location.href='../html/cadastroUsuario.php';alert('Login já cadastrado');</script>";
        }else{
            $_query = "INSERT INTO usuario(nome,cpf,login,senha,modoUsuario,Igreja_idIgreja,dataRegistro) VALUES('$_nome','$_cpf','$_login','$_senha',$_modoUsuario,$_idIgreja,curdate())";
            $_SQL->sql_query($_query);
            header('location:../html/mainUsuarios.php');
        }
        
    }else{
        header('location:../html/mainUsuarios.php');
    }

?>