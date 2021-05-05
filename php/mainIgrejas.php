<?php
    date_default_timezone_set('brazil/east');
    include "ConnectionFactory.php";

    if(isset($_REQUEST['filtro'])){
        $_filtro = $_REQUEST['filtro'];
        $_op = $_REQUEST['op'];
    }else{
        $_filtro = "";
        $_op = 0;
    }
    $_SQL = new ConnectionFactory();
    if($_op ==0){
        $_query = "SELECT * FROM Igreja";
    }else if($_op == 1){
        $_query = "SELECT * FROM Igreja WHERE localizacao like '$_filtro%'";
    }else if($_op==2){
        $_query = "SELECT * FROM Igreja WHERE dataFundacao like '$_filtro%'";
    }
    $_consulta = $_SQL->sql_query($_query);
    $_retorno = "<spam class='fontTitulo'>Igrejas</spam><br>";
    $_retorno.= "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Localizacao</td>";
    $_retorno.="<td class='fontSubTitulo'>Data Fundacao</td>";
    //$_retorno.="<td class='fontSubTitulo'>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['localizacao']."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['dataFundacao']))."</td>";
        //$_retorno.="<td><a href='../php/excluirIgreja.php?idIgreja=".$_resultado['idIgreja']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarIgreja.php?idIgreja=".$_resultado['idIgreja']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="</tr>";
    }
    $_retorno.= "</table>";   
       
    echo $_retorno;
       
    

?>