<?php
    include "ConnectionFactory.php";
    session_start();
    if(isset($_REQUEST['cadastrar'])){
        $_SQL = new ConnectionFactory();
        $_nome = $_REQUEST['nome'];
        $_cpf = $_REQUEST['cpf'];
        $_tel = $_REQUEST['tel'];
        $_rg = $_REQUEST['rg'];
        $_email = $_REQUEST['email'];
        $_dBatismo = $_REQUEST['dBatismo'];
        $_dNascimento = $_REQUEST['dNascimento'];
        $_end = $_REQUEST['endereco'];
        $_natu = $_REQUEST['naturalidade'];
        $_igreja = $_SESSION['idIgreja'];
        $_query = "SELECT * FROM Membro WHERE cpf='$_cpf'";
        $_consulta = $_SQL->sql_query($_query);
        if(mysql_num_rows($_consulta)>0){
            echo "<script>location.href='../html/cadastroMembro.php';alert('CPF já cadastrado');</script>";
        }else{
            $_query = "INSERT INTO Membro(cpf,nome,tel,rg,email,dataNascimento,dataBatismo,endereco,naturalidade,Igreja_idIgreja,disciplinado,desligado,cargo) VALUES('$_cpf','$_nome','$_tel','$_rg','$_email','$_dNascimento','$_dBatismo','$_end','$_natu',$_igreja,0,0,'Membro')";
            $_SQL->sql_query($_query);
            header('location:../html/mainMembros.php');
        }
    }else{
        header('location:../html/mainMembros.php');
    }

?>