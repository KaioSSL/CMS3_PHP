<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['alterar'])){
        if(!($_REQUEST['nome']=='Principal')){
            $_SQL = new ConnectionFactory();
            $_id = $_REQUEST['id'];
            $_setor = $_REQUEST['comboSetores'];
            $_dsc = $_REQUEST['dsc'];
            $_nome = $_REQUEST['nome'];
            $_query = "UPDATE Caixa SET nomeCx = '$_nome', idSetor = $_setor, dscCx = '$_dsc' WHERE idCaixa = $_id";
            $_SQL->sql_query($_query);
            header('location:../html/mainCaixas.php');
        }else{
            header('location:../html/mainCaixas.php');
        }
    }else{
        header('location:../html/mainCaixas.php');
    }
?>