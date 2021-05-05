<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Membro</title>
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
                    <a href="../html/mainMembros.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Cadastro de Membro</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/cadastroMembro.php">
                        <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)'required><br>
                        <spam class="font1">Telefone:</spam> <input type="text" id='tel' name="tel" onkeypress='mask_tel(frm1.tel)' maxlength='16' onblur='validarTel(frm1.tel)' required><br>
                        <spam class="font1">CPF:</spam> <input type="text" name="cpf" onkeypress='mask_cpf(frm1.cpf)' maxlength='14' id='cpf' onblur='validarCpf(frm1.cpf)' required><br>
                        <spam class="font1">RG:</spam> <input type="text" id='rg' name="rg" onkeypress='mask_rg(frm1.rg)' maxlength='12' onblur='validarRg(frm1.rg)' required><br>
                        <spam class="font1">Naturalidade:</spam><input type="text" name='naturalidade' onnkeypress='mask_nome(frm1.naturalidade)' required><br>
                        <spam class="font1">Endereço:</spam> <input type="text" name="endereco" required><br>
                        <spam class="font1">Data Nascimento:</spam> <input type="date" name="dNascimento" required><br>
                        <spam class="font1">Data Batismo:</spam> <input type="date" name="dBatismo" required><br>
                        <spam class="font1">Email:</spam> <input type="email" name="email" required><br>


                            <?php

                            ?>
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