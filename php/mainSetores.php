<?php
    date_default_timezone_set('brazil/east');
    include "ConnectionFactory.php";
    if(!isset($_SESSION)){
        session_start();
        $_igreja = $_SESSION['idIgreja'];
    }
    $_igreja = $_SESSION['idIgreja'];
    $_modoUsuario = $_SESSION['modoUsuario'];
    
    if(isset($_REQUEST['filtro'])){
        $_filtro = $_REQUEST['filtro'];
        $_op = $_REQUEST['op'];
    }else{
        $_filtro = "";
        $_op = 0;
    }
    $_SQL = new ConnectionFactory();
    if($_modoUsuario==5){
        if($_op ==0){
            $_query = "SELECT * FROM Setores WHERE";
        }else if($_op == 1){
            $_query = "SELECT * FROM Setores WHERE nomeSe like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Setores WHERE dataRegistroSe like '$_filtro%'";
        }
    }else{
        if($_op ==0){
            $_query = "SELECT * FROM Setores WHERE idIgreja = $_igreja";
        }else if($_op == 1){
            $_query = "SELECT * FROM Setores WHERE idIgreja = $_igreja AND nomeSe like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Setores WHERE idIgreja = $_igreja AND dataRegistroSe like '$_filtro%'";
        }
    }
    $_consulta = $_SQL->sql_query($_query);
    $_retorno = "<spam class='fontTitulo'>Setores </spam><br>";
    $_retorno.= "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Nome</td>";
    $_retorno.="<td class='fontSubTitulo'>Data Registro</td>";
   // $_retorno.="<td class='fontSubTitulo'>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['nomeSe']."</td>";
        $_retorno.="<td>".date('d/m/y',strtotime($_resultado['dataRegistroSe']))."</td>";
       //$_retorno.="<td><a href='../php/excluirSetor.php?id=".$_resultado['idSetor']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarSetor.php?id=".$_resultado['idSetor']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="</tr>";
    }
    $_retorno.= "</table>";   
       
    echo $_retorno;
       
    

?>