<?php
    include "ConnectionFactory.php";
    if(isset($_REQUEST['cadastrar'])){
        $_SQL = new ConnectionFactory();
        $_localidade = $_REQUEST['localizacao'];
        $_dFundacao = $_REQUEST['dataFundacao'];
        $_nome = $_REQUEST['nome'];
        $_query = "INSERT INTO Igreja(localizacao,dataFundacao,nome) VALUES('$_localidade','$_dFundacao','$_nome')";
        $_SQL->sql_query($_query);
        $_query = "SELECT max(idIgreja) as ultimoId FROM Igreja";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_ultimoId = $_resultado['ultimoId'];
        $_query = "INSERT INTO Setores(nomeSe,dataRegistroSe,dscSe,idIgreja) VALUES('Principal $_nome',curdate(),'Principal',$_ultimoId)";
        $_SQL->sql_query($_query);
        $_query = "SELECT max(idSetor) as ultimoId FROM Setores";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_ultimoId = $_resultado['ultimoId'];
        $_query = "INSERT INTO Caixa(nomeCx,idSetor,dataRegistroCx,saldo,dscCx) VALUES('Principal $_nome',$_ultimoId,curdate(),0,'Caixa Principal')";
        $_SQL->sql_query($_query);
        header('location:../html/mainIgrejas.php');
    }else{
        header('location:../html/mainIgrejas.php');
    }
?>