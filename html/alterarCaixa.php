<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Caixa WHERE idCaixa = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_dsc = $_resultado['dscCx'];
        $_nome = $_resultado['nomeCx'];
        
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Caixa</title>
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
                    <a href="../html/mainCaixas.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Alterar Caixa</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarCaixa.php">
                            <input type='hidden' value='<?php echo $_id; ?>' name='id'>
                            <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)' value='<?php echo $_nome; ?>' required><br>
                            <?php
                                if(!isset($_SESSION)){
                                    session_start();
                                }
                                $_SQL = new ConnectionFactory();
                                $_SQL->boxSetores($_SESSION['idIgreja']);

                            ?>
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