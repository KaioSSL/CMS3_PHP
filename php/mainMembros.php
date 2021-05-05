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
            $_query = "SELECT * FROM Membro WHERE";
        }else if($_op == 1){
            $_query = "SELECT * FROM Membro WHERE nome like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Membro WHERE cpf like '$_filtro%'";
        }else if($_op==3){
            $_query = "SELECT * FROM Membro WHERE RG like '$_filtro%'";
        }else if($_op==4){
            $_query = "SELECT * FROM Membro WHERE email like '$_filtro%'";
        }else if($_op==5){
            $_query = "SELECT * FROM Membro WHERE tel like '$_filtro%'";
        }
    }else{
        if($_op ==0){
            $_query = "SELECT * FROM Membro WHERE Igreja_idIgreja = $_igreja";
        }else if($_op == 1){
            $_query = "SELECT * FROM Membro WHERE Igreja_idIgreja = $_igreja AND nome like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Membro WHERE Igreja_idIgreja = $_igreja AND cpf like '$_filtro%'";
        }else if($_op==3){
            $_query = "SELECT * FROM Membro WHERE Igreja_idIgreja = $_igreja AND RG like '$_filtro%'";
        }else if($_op==4){
            $_query = "SELECT * FROM Membro WHERE Igreja_idIgreja = $_igreja AND email like '$_filtro%'";
        }else if($_op==5){
            $_query = "SELECT * FROM Membro WHERE Igreja_idIgreja = $_igreja AND tel like '$_filtro%'";
        }
    }
    $_consulta = $_SQL->sql_query($_query);
    $_retorno = "<spam class='fontTitulo'>Membros</spam><br>";
    $_retorno.= "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Nome</td>";
    $_retorno.="<td class='fontSubTitulo'>CPF</td>";
    $_retorno.="<td class='fontSubTitulo'>RG</td>";
    $_retorno.="<td class='fontSubTitulo'>Email</td>";
    $_retorno.="<td class='fontSubTitulo'>Telefone</td>";
    $_retorno.="<td class='fontSubTitulo'>Data Nascimento</td>";
    $_retorno.="<td class='fontSubTitulo'>Data Batismo</td>";
    $_retorno.="<td class='fontSubTitulo'>Naturalidade</td>";
    $_retorno.="<td class='fontSubTitulo'>ID Desligamento</td>";
    $_retorno.="<td class='fontSubTitulo'>ID Disciplina</td>";
    //$_retorno.="<td>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['nome']."</td>";
        $_retorno.="<td>".$_resultado['cpf']."</td>";
        $_retorno.="<td>".$_resultado['RG']."</td>";
        $_retorno.="<td>".$_resultado['email']."</td>";
        $_retorno.="<td>".$_resultado['tel']."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['dataNascimento']))."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['dataBatismo']))."</td>";
        $_retorno.="<td>".$_resultado['naturalidade']."</td>";
        if($_resultado['idDesligamento']==NULL){
            $_retorno.="<td>Membro Ativo</td>";
        }else{
            $_retorno.="<td>".$_resultado['idDesligamento']."</td>";    
        }
        if($_resultado['idDisciplina']==NULL){
            $_retorno.="<td>Sem Disciplina</td>";
        }else{
            $_retorno.="<td>".$_resultado['idDisciplina']."</td>";    
        }
       //$_retorno.="<td><a href='../php/excluirMembro.php?cpf=".$_resultado['cpf']."'><img src='../img/deletarMembro.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarMembro.php?cpf=".$_resultado['cpf']."'><img src='../img/alterarMembro.png' class='icon'></a></td>";
        $_retorno.="</tr>";
    }
    $_retorno.= "</table>";   
       
    echo $_retorno;
       
    

?>