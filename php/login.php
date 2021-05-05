<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['logar'])){
        $_SQL = new ConnectionFactory();
        $_login = $_REQUEST['login'];
        $_senha = $_REQUEST['senha'];
        $_query = "SELECT * FROM usuario WHERE login = '$_login'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_modoUsuario = $_resultado['modoUsuario'];
        $_igreja = $_resultado['Igreja_idIgreja'];
        $_linhas = mysql_num_rows($_consulta);
        if($_linhas<1){
            echo "<script>location.href = '../html/login.php';
            alert('Usuario não existe');</script>";
        }else if($_resultado['senha']!=$_senha){
            echo "<script>location.href='../html/login.php';
            alert('Senha Incorreta');</script>";
        }else{
            session_start();
            $_SESSION['usuario'] = $_login;
            $_SESSION['modoUsuario'] = $_modoUsuario;
            $_SESSION['idIgreja'] = $_igreja;
            header('location:../html/main.php');
        }
    }else{
        header('location:../html/login.php');
    }

?>