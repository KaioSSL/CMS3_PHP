<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['idIgreja'])){
        $_SQL = new ConnectionFactory();
        $_idIgreja = $_REQUEST['idIgreja'];
        $_query = "SELECT * FROM Igreja WHERE idIgreja = '$_idIgreja'";
        $_consulta = $_SQL->sql_query($_query);
        $_resutado = mysql_fetch_array($_consulta);
        $_localizacao = $_resutado['localizacao'];
        $_nome = $_resutado['nome'];
    }else{
        header('location:../html/mainIgrejas.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Igreja</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src="../js/masks.js"></script>
    </head>
    <body>
        <div class="boxPrincipal">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxContent">
                <div class="contentBar">
                    <a href="../html/mainIgrejas.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Alterar Igreja</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarIgreja.php">
                        <input type='hidden' name="idIgreja" value="<?php echo $_idIgreja; ?>">
                         <spam class="font1">Localização:</spam> <input type="text" name="localizacao" value='<?php echo $_localizacao; ?>' required><br>
                        <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)' value='<?php echo $_nome; ?>' required><br>
                        <spam class="font1">Data Fundação:</spam> <input type="date" name="dataFundacao" required><br>
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