<?php
    date_default_timezone_set('brazil/east');
    include "ConnectionFactory.php";
    if(!isset($_SESSION)){
        session_start();
    }
    $_idIgreja = $_SESSION['idIgreja'];
    $_modoUsuario = $_SESSION['modoUsuario'];

    if(isset($_REQUEST['filtro'])){
        $_filtro = $_REQUEST['filtro'];
        if($_filtro==""){
            $_op = 0;
        }else{
            $_op = $_REQUEST['op'];
        }
    }else{
        $_filtro = "";
        $_op = 0;
    }
    $_SQL = new ConnectionFactory();
    if($_modoUsuario==5){
        if($_op ==0){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor";
        }else if($_op == 1){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Caixa.nomeCx like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.nomeSe like '$_filtro%'";
        }else if($_op==4){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND DAY(Oferta.dataOferta) = '$_filtro'";
        }else if($_op==5){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND MONTH(Oferta.dataOferta) = '$_filtro'";
        }else if($_op==6){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND YEAR(Oferta.dataOferta) = '$_filtro'";
        }else if($_op==3 && $_filtro!=""){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Oferta.valor > $_filtro";
        }else{
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor ";
        }
    }
    else{
        if($_op ==0){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja";
        }else if($_op == 1){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja AND Caixa.nomeCx like '$_filtro%'";
        }else if($_op==2){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja AND Setores.nomeSe like '$_filtro%'";
        }else if($_op==4){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja AND  DAY(Oferta.dataOferta) = '$_filtro'";
        }else if($_op==5){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja AND MONTH(Oferta.dataOferta) = '$_filtro'";
        }else if($_op==6){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja AND YEAR(Oferta.dataOferta) = '$_filtro'";
        }else if($_op==3 && $_filtro!=""){
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja AND Oferta.valor > $_filtro";
        }else{
            $_query = "SELECT * FROM Oferta,Caixa,Setores WHERE Oferta.idCaixa = Caixa.idCaixa AND Caixa.idSetor = Setores.idSetor AND Setores.idIgreja = $_idIgreja";
        }
    }
    $_consulta = $_SQL->sql_query($_query);
    $_total = 0;
    $_retorno= "<table>";
    $_retorno.="<tr>";
    $_retorno.="<td class='fontSubTitulo'>Setor</td>";
    $_retorno.="<td class='fontSubTitulo'>Caixa</td>";
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
        $_retorno.="<td>R$ ".number_format($_resultado['valor'],2,',','.')."</td>";
        $_retorno.="<td>".$_resultado['dscOferta']."</td>";
        $_data = date('d/m/Y',strtotime(str_replace('/','-',$_resultado['dataOferta'])));
        $_retorno.="<td>".$_data."</td>";
        $_retorno.="<td><a href='../php/excluirOferta.php?id=".$_resultado['idOferta']."'><img src='../img/deletar.png' class='icon'></a></td>";
        $_retorno.="<td><a href='../html/alterarOferta.php?id=".$_resultado['idOferta']."'><img src='../img/alterar.png' class='icon'></a></td>";
        $_retorno.="</tr>";
        $_total = $_total + $_resultado['valor'];
    }
    $_retorno.= "</table>";   
    $_texto = "<spam class='fontTitulo'>Ofertas, Total = R$ ".number_format($_total,2,',','.')."</spam><br>";
    $_texto.=$_retorno;   
    echo $_texto;
       
    

?>