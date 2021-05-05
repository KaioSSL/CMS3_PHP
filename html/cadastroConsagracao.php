<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Consagração</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
    </head>
    <body>
        <div class="boxPrincipal">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxContent">
                <div class="contentBar">
                    <a href="../html/mainConsagracoes.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Cadastro de Consagração</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/cadastroConsagracao.php">
                            <spam class="font1">CPF:</spam> 
                            <?php
                                include "../php/ConnectionFactory.php";
                                $_SQL = new ConnectionFactory();
                                $_SQL->boxMembros();
                            ?>
                            <br>
                            <spam class='font1'>Cargo:</spam>
                            <select name='comboCargos' class='selectFiltro' required>
                                <option value='' disabled>Selecione um Cargo</option>
                                <option value='Membro'>Membro</option>
                                <option value='Cooperador'>Cooperador</option>
                                <option value='Diacono'>Diacono</option>
                                <option value='Presbítero'>Presbítero</option>
                                <option value='Evangelista'>Evangelista</option>
                                <option value='Pastor'>Pastor</option>
                            </select>
                            <br>
                            <spam class="font1">Data Consagração:</spam> <input type="date" name="dConsagracao" required>
                            <br>
                            <spam class="font1">Descrição:</spam>
                            <br>
                            <textarea name="dsc" rows="10" cols="60" required></textarea>
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