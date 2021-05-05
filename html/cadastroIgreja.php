<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Igreja</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src='../js/masks.js'></script>
        <script>
        </script>
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
                <spam class="fontTitulo">Cadastro de Igreja</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/cadastroIgreja.php">
                        <spam class="font1">Localização:</spam> <input type="text" name="localizacao" required><br>
                        <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)' required><br>
                        <spam class="font1">Data Fundação:</spam> <input type="date" name="dataFundacao" required><br>
                        <input type='submit' value='Cadastrar' name='cadastrar' class="buttonForm">
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