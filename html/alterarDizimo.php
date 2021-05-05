<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Dizimo WHERE idDizimo = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_valor = $_resultado['valorDizimo'];
        $_dsc = $_resultado['dscDizimo'];
        $_data = $_resultado['dataDizimo'];
    }else{
        header('location:../html/mainDizimos.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Dizimo</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src='../js/masks.js'></script>
    </head>
    <body>
        <div class="boxPrincipal">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxContent">
                <div class="contentBar">
                    <a href="../html/mainDizimos.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Alterar Dizimo</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarDizimo.php">
                            <input type='hidden' value='<?php echo $_id; ?>' name='id'>
                            <spam class="font1">Data Pagamento:</spam> <input type="date" name="data" value='<?php echo $_data; ?>'required>
                            <br>
                            <spam class="font1">Valor:</spam><input type="text" onkeypress="isNumber(frm1.valor)" name="valor" value='<?php echo $_valor; ?>' required>
                            <br>
                            <spam class="font1">Descrição:</spam>
                            <br>
                            <textarea name="dsc" rows="10" cols="60" draggable="false"  required><?php echo $_dsc; ?></textarea>
                            <br>
                            <input type='submit' value='Alterar' name='alterar' class="buttonForm">
                        </form>
                    </div>
                    
                
                </div>
                <footer>
                    <h5>CMS - Church Management System é um Sistema desenvolvido e distribuído por @SYNMCALL. @ Copyright Todos os Direitos     Reservados.
                    </h5>
                </footer>
            
            </div>
        </div>
    
    
    </body>
</html>