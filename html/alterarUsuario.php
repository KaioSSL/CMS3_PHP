<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['login'])){
        $_SQL = new ConnectionFactory();
        $_login = $_REQUEST['login'];
        $_query = "SELECT * FROM usuario WHERE login = '$_login'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_nome = $_resultado['nome'];
        $_cpf = $_resultado['cpf'];
        $_senha = $_resultado['senha'];
        
        
    }else{
        header('location:../html/mainUsuarios.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Usuario</title>
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
                        <form name="frm1" action="../php/alterarUsuario.php">
                        <input type='hidden' value='<?php echo $_login; ?>' name='loginAA'>
                        <spam class="font1">Login:</spam> <input type="text" name="login" required value='<?php echo $_login; ?>'><br>
                        <spam class="font1">Senha:</spam> <input type="text" name="senha" required value='<?php echo $_senha; ?>'><br>
                        <spam class="font1">CPF:</spam> <input type="text" name="cpf" onkeypress='mask_cpf(frm1.cpf)' onblur='validarCpf(frm1.cpf)' required value='<?php echo $_cpf; ?>'><br>
                        <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)' required value='<?php echo $_nome; ?>'><br>
                        <spam class="font1">Modo Usuario:</spam>Admin.<input type="radio" name='modoUsuario' value='5' required>Usuario.<input type="radio" name='modoUsuario' value='1' required><br>
                            <?php
                                $_SQL = new ConnectionFactory();
                                $_SQL->boxIgrejas();
                            ?><br><br>

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