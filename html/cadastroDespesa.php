<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Despesa</title>
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
                    <a href="../html/mainDespesas.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Cadastro de Despesa</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/cadastroDespesa.php">

                        <?php
                            if(!isset($_SESSION)){
                                session_start();
                            }
                            include "../php/ConnectionFactory.php";
                            $_SQL = new ConnectionFactory();
                            $_SQL->boxCaixas();
                            ?>
                        <br>
                        <spam class="font1">Valor:</spam> <input type="text" name="valor" onkeypress='isNumber(frm1.valor)'required>
                        <br>
                        <spam class="font1">Data:</spam> <input type="date" name="data" required><br>
                        <spam class='font1'>Descrição:</spam>
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