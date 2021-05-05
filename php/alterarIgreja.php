<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        $_SQL = new ConnectionFactory();
        $_localidade = $_REQUEST['localizacao'];
        $_dFundacao = $_REQUEST['dataFundacao'];
        $_idIgreja = $_REQUEST['idIgreja'];
        $_nome = $_REQUEST['nome'];
        $_query = "UPDATE Igreja SET nome = '$_nome',localizacao = '$_localidade', dataFundacao = '$_dFundacao' WHERE idIgreja = $_idIgreja";
        $_SQL->sql_query($_query);
        echo "<script>location.href='../html/cadastroIgreja.php';alert('Alterado com Sucesso');</script>";
    }else{
        header('location:../html/mainIgrejas.php');
    }
?>