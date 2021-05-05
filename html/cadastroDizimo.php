<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Dizimo</title>
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
                <spam class="fontTitulo">Cadastro de Dizimo</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/cadastroDizimo.php">
                            <spam class="font1">Membro:</spam> 
                            <?php
                                include "../php/ConnectionFactory.php";
                                $_SQL = new ConnectionFactory();
                                $_SQL->boxMembros();
                            ?>
                            <br>
                            <spam class="font1">Data Pagamento:</spam> <input type="date" name="dataP" required>
                            <br>
                            <spam class="font1">Valor:</spam> <input type="text" onkeypress="isNumber(frm1.valor)" name="valor" required>
                            <br>
                            <spam class="font1">Descrição:</spam>
                            <br>
                            <textarea name="dsc" rows="10" cols="60" draggable="false"  required></textarea>
                            <br>
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