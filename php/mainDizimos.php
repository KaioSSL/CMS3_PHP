<?php
    date_default_timezone_set('brazil/east');
    if(!isset($_SESSION)){
        session_start();
    }
    $_idIgreja = $_SESSION['idIgreja'];
    $_modoUsuario = $_SESSION['modoUsuario'];
    include "ConnectionFactory.php";

    if(isset($_REQUEST['filtro'])){
        $_filtro = $_REQUEST['filtro'];
        if($_filtro == ""){
            $_op = 0;
        }else{
            $_op = $_REQUEST['op'];
        }
    }else{
        $_filtro = "";
        $_op = 0;
    }
    $_SQL = new ConnectionFactory();
    if($_modoUsuario ==5){
        if($_op ==0){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro";
        }else if($_op == 1){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Membro.nome like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Dizimo.dataDizimo like '$_filtro%'";
        }else if($_op==3){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND DAY(Dizimo.dataDizimo)='$_filtro'";
        }else if($_op==4){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND MONTH(Dizimo.dataDizimo)='$_filtro'";
        }else if($_op==5){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND YEAR(Dizimo.dataDizimo)='$_filtro'";
        }
    }else{
        if($_op ==0){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja";
        }else if($_op == 1){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja AND Membro.nome like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja AND Dizimo.dataDizimo like '$_filtro%'";
        }else if($_op==3){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja AND DAY(Dizimo.dataDizimo) = '$_filtro'";
        }else if($_op==4){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja AND MONTH(Dizimo.dataDizimo) = '$_filtro'";
        }else if($_op==5){
            $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja AND YEAR(Dizimo.dataDizimo)='$_filtro'";
        }
    }/*else if($_op==3 && $_filtro!=""){
        $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja AND Dizimo.valor > $_filtro";
    }else{
        $_query = "SELECT * FROM Dizimo,Caixa,Setores,Membro WHERE Dizimo.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Membro.cpf = Dizimo.cpfMembro AND Setores.idIgreja = $_idIgreja";
    }*/
    $_consulta = $_SQL->sql_query($_query);
    $_total = 0;
    $_retorno = "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Setor</td>";
    $_retorno.="<td class='fontSubTitulo'>Caixa</td>";
    $_retorno.="<td class='fontSubTitulo'>Nome Membro</td>";
    $_retorno.="<td class='fontSubTitulo'>CPF</td>";
    $_retorno.="<td class='fontSubTitulo'>Valor</td>";
    $_retorno.="<td class='fontSubTitulo'>Descrição</td>";
    $_retorno.="<td class='fontSubTitulo'>Data</td>";
    $_retorno.="<td class='fontSubTitulo'>Excluir</td>";
    $_retorno.="<td class='fontSubTitulo'>Alterar</td>";
    $_retorno.="</tr>";
    while($_resultado = mysql_fetch_array($_consulta)){
        $_retorno.="<tr>";
        $_retorno.="<td>".$_resultado['nomeSe']."</td>";
        $_retorno.="<td>".$_resultado['nomeCx']."</td>";
        $_retorno.="<td>".$_resultado['nome']."</td>";
        $_retorno.="<td>".$_resultado['cpfMembro']."</td>";
        $_retorno.="<td>R$ ".number_format($_resultado['valorDizimo'],2,',','.')."</td>";
        $_retorno.="<td>".$_resultado['dscDizimo']."</td>";
        $_retorno.="<td>".date('d/m/Y',strtotime($_resultado['dataDizimo']))."</td>";
        $_retorno.="<td><a href='../php/excluirDizimo.php?id=".$_resultado['idDizimo']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarDizimo.php?id=".$_resultado['idDizimo']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="</tr>";
        $_total = $_total + $_resultado['valorDizimo'];
    }
    $_retorno.= "</table>";   
    $_texto = "<spam class='fontTitulo'>Dizimos, Total = R$ ".number_format($_total,2,',','.')."</spam><br>";
    $_texto .=$_retorno;
    echo $_texto;
       
    

?>