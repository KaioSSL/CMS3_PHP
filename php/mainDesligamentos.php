<?php
    date_default_timezone_set('brazil/east');
    include "ConnectionFactory.php";
    if(!isset($_SESSION)){
        session_start();
        $_idIgreja = $_SESSION['idIgreja'];
    }
    $_idIgreja = $_SESSION['idIgreja'];
    $_modoUsuario = $_SESSION['modoUsuario'];
    if(isset($_REQUEST['filtro'])){
        $_filtro = $_REQUEST['filtro'];
        $_op = $_REQUEST['op'];
        if($_filtro ==''){
            $_op = 0;
        }
    }else{
        $_filtro = "";
        $_op = 0;
    }
    $_SQL = new ConnectionFactory();
    if($_modoUsuario==5){
        if($_op ==0){
            $_query = "SELECT * FROM Desligamento";
        }else if($_op == 1){
            $_query = "SELECT * FROM Desligamento WHERE cpf like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Desligamento WHERE data like '$_filtro%'";
        }else if($_op==3){
            $_query = "SELECT * FROM Desligamento WHERE id like '$_filtro%'";
        }
    }else{
        if($_op ==0){
            $_query = "SELECT * FROM Desligamento WHERE idIgreja = $_idIgreja";
        }else if($_op == 1){
            $_query = "SELECT * FROM Desligamento WHERE cpf like '$_filtro%' AND idIgreja = $_idIgreja";
        }else if($_op==2){
            $_query = "SELECT * FROM Desligamento WHERE data like '$_filtro%' AND idIgreja = $_idIgreja";
        }else if($_op==3){
            $_query = "SELECT * FROM Desligamento WHERE id like '$_filtro%' AND idIgreja = $_idIgreja";
        }
    }
    $_consulta = $_SQL->sql_query($_query);
    $_retorno = "<spam class='fontTitulo'>Registros de Desligamentos</spam><br>";
    $_retorno.= "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>ID</td>";
    $_retorno.="<td class='fontSubTitulo' >CPF</td>";
    $_retorno.="<td class='fontSubTitulo' >Data</td>";
    $_retorno.="<td class='fontSubTitulo'>Descrição</td>";
    $_retorno.="<td class='fontSubTitulo'>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="<td class='fontSubTitulo'>Religar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['id']."</td>";
        $_retorno.="<td>".$_resultado['cpf']."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['data']))."</td>";
        $_retorno.="<td>".$_resultado['dsc']."</td>";
        $_retorno.="<td><a href='../php/excluirDesligamento.php?id=".$_resultado['id']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarDesligamento.php?id=".$_resultado['id']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../php/religarMembro.php?id=".$_resultado['id']."'><img src='../img/religarMembro.png' class='icon'></a></td>";
        $_retorno.="</tr>";
    }
    $_retorno.= "</table>";   
       
    echo $_retorno;
       
    

?>