<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        if(!($_REQUEST['nome']=='Principal')){
            $_SQL = new ConnectionFactory();
            $_setor = $_REQUEST['comboSetores'];
            $_dsc = $_REQUEST['dsc'];
            $_nome = $_REQUEST['nome'];
            $_query = "INSERT INTO Caixa(idSetor,dscCx,dataRegistroCx,saldo,nomeCx) VALUES($_setor,'$_dsc',curdate(),0,'$_nome')";
            $_SQL->sql_query($_query);
            header('location:../html/mainCaixas.php');
        }else{
            header('location:../html/mainCaixas.php');
        }
    }else{
        header('location:../html/mainCaixas.php');
    }

?>