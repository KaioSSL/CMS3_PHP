<?php
    date_default_timezone_set('brazil/east');
    include "ConnectionFactory.php";
    if(!isset($_SESSION)){
        session_start();
        $_idIgreja = $_SESSION['idIgreja'];
        $_modoUsuario = $_SESSION['modoUsuario'];
    }else{
        $_idIgreja = $_SESSION['idIgreja'];
        $_modoUsuario = $_SESSION['modoUsuario'];
    }
    if(isset($_REQUEST['filtro'])){
        $_filtro = $_REQUEST['filtro'];
        $_op = $_REQUEST['op'];
    }else{
        $_filtro = "";
        $_op = 0;
    }
    $_SQL = new ConnectionFactory();
    if($_modoUsuario == 5){
        if($_op ==0){
            $_query = "SELECT * FROM Caixa,Setores WHERE Caixa.idSetor = Setores.idSetor";
        }else if($_op == 1){
            $_query = "SELECT * FROM Caixa,Setores WHERE Setores.nomeSe like '$_filtro%' AND Caixa.idSetor = Setores.idSetor";
        }else if($_op==2){
            $_query = "SELECT * FROM Caixa,Setores WHERE Caixa.dataRegistroCx like '$_filtro%' AND Caixa.idSetor = Setores.idSetor";
        }
    }else{
        if($_op ==0){
            $_query = "SELECT * FROM Caixa,Setores WHERE Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja";
        }else if($_op == 1){
            $_query = "SELECT * FROM Caixa,Setores WHERE Setores.nomeSe like '$_filtro%' AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja";
        }else if($_op==2){
            $_query = "SELECT * FROM Caixa,Setores WHERE Caixa.dataRegistroCx like '$_filtro%' AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja";
        }
    }
    $_consulta = $_SQL->sql_query($_query);
    $_total = 0;

    $_retorno = "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Setor</td>";
    $_retorno.="<td class='fontSubTitulo'>Nome Setor</td>";
    $_retorno.="<td class='fontSubTitulo'>Saldo</td>";
    $_retorno.="<td class='fontSubTitulo'>Descrição</td>";    
    $_retorno.="<td class='fontSubTitulo'>Data Registro</td>";
    //$_retorno.="<td class='fontSubTitulo'>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['nomeSe']."</td>";
        $_retorno.="<td>".$_resultado['nomeCx']."</td>";
        $_retorno.="<td>R$ ".number_format($_resultado['saldo'],2,',','.')."</td>";
        $_retorno.="<td>".$_resultado['dscCx']."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['dataRegistroCx']))."</td>";
        //$_retorno.="<td><a href='../php/excluirCaixa.php?id=".$_resultado['id']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarCaixa.php?id=".$_resultado['idCaixa']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="</tr>";
        $_total = $_total +  $_resultado['saldo'];
    }
    $_retorno.= "</table>";
    $_retornar = "<spam class='fontTitulo'>Caixas, Total = R$ ".number_format($_total,2,',','.')."</spam><br>";
    $_retornar.=$_retorno;
    
       
    echo $_retornar;
       
    

?>