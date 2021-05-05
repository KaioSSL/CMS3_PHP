<?php
    include "ConnectionFactory.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_REQUEST['cadastrar'])){
        if(!($_REQUEST['nome']=='Principal')){
            $_SQL = new ConnectionFactory();
            $_nome = $_REQUEST['nome'];
            $_dsc = $_REQUEST['dsc'];
            $_idIgreja = $_SESSION['idIgreja'];
            $_query = "INSERT INTO Setores(nomeSe,dataRegistroSe,dscSe,idIgreja) VALUES('$_nome',curdate(),'$_dsc',$_idIgreja)";
            $_SQL->sql_query($_query);
            echo "<script>location.href='../html/mainSetores.php';alert('Setor Cadastrado com Sucesso');</script>";
        }else{
            header('location:../html/mainSetores.php');    
        }
    }else{
        header('location:../html/mainSetores.php');
    }
?>