<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Usuario</title>
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
                    <a href="../html/mainUsuarios.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Cadastro de Usuário</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/cadastroUsuario.php">
                        <spam class="font1">Login:</spam> <input type="text" id='login' name="login"  required><br>
                        <spam class="font1">Senha:</spam> <input type="text" id='senha' name="senha"  required><br>
                        <spam class="font1">CPF:</spam> <input type="text" id="cpf" name="cpf" onkeypress='mask_cpf(frm1.cpf)' maxlength='14' onblur='validarCpf(frm1.cpf)' required><br>
                        <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)'  id='nome'  required><br>
                        <spam class="font1">Modo Usuario:</spam>Admin.<input type="radio" name='modoUsuario' value='5' required>Usuario.<input type="radio" name='modoUsuario' value='1' required><br>
                            <?php
                                include "../php/ConnectionFactory.php";
                                $_SQL = new ConnectionFactory();
                                $_SQL->boxIgrejas();
                            ?><br><br>

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