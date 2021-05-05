<?php
    include "ConnectionFactory.php";
    session_start();
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_nome = $_REQUEST['nome'];
        $_cpf = $_REQUEST['cpfLogin'];
        $_tel = $_REQUEST['tel'];
        $_rg = $_REQUEST['rg'];
        $_email = $_REQUEST['email'];
        $_dBatismo = $_REQUEST['dBatismo'];
        $_dNascimento = $_REQUEST['dNascimento'];
        $_end = $_REQUEST['endereco'];
        $_natu = $_REQUEST['naturalidade'];
        $_query = "UPDATE Membro SET nome = '$_nome', tel = '$_tel', RG = '$_rg', email = '$_email', dataNascimento = '$_dNascimento', dataBatismo = '$_dBatismo', endereco = '$_end',naturalidade = '$_natu' WHERE cpf = '$_cpf'";
        $_SQL->sql_query($_query);
        header('location:../html/mainMembros.php');
        
    }else{
        header('location:../html/cadastroMembro.php');
    }

?>