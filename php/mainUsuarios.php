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
        $_query = "SELECT * FROM Usuario";
    }else if($_op == 1){
        $_query = "SELECT * FROM Usuario WHERE nome like '$_filtro%'";
    }else if($_op==2){
        $_query = "SELECT * FROM Usuario WHERE cpf like '$_filtro%'";
    }else if($_op==3){
        $_query = "SELECT * FROM Usuario WHERE login like '$_filtro%'";
    }else if($_op==4){
        $_query = "SELECT * FROM Usuario WHERE dataRegistro like '$_filtro%'";
    }
    $_consulta = $_SQL->sql_query($_query);
    $_retorno = "<spam class='fontTitulo'>Usuários</spam><br>";
    $_retorno.= "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Nome</td>";
    $_retorno.="<td class='fontSubTitulo'>CPF</td>";
    $_retorno.="<td class='fontSubTitulo'>Login</td>";
    $_retorno.="<td class='fontSubTitulo'>Senha</td>";
    $_retorno.="<td class='fontSubTitulo'>Data Registro</td>";
    $_retorno.="<td class='fontSubTitulo'>Modo Usuario</td>";
    $_retorno.="<td class='fontSubTitulo'>Id Igreja</td>";
    $_retorno.="<td class='fontSubTitulo'>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['nome']."</td>";
        $_retorno.="<td>".$_resultado['cpf']."</td>";
        $_retorno.="<td>".$_resultado['login']."</td>";
        $_retorno.="<td>".$_resultado['senha']."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['dataRegistro']))."</td>";
        $_retorno.="<td>".$_resultado['modoUsuario']."</td>";
        $_retorno.="<td>".$_resultado['Igreja_idIgreja']."</td>";
        $_retorno.="<td><a href='../php/excluirUsuario.php?login=".$_resultado['login']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarUsuario.php?login=".$_resultado['login']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="</tr>";
    }
    $_retorno.= "</table>";   
       
    echo $_retorno;
       
    

?>