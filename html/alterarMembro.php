<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['cpf'])){
        $_SQL = new ConnectionFactory();
        $_cpf = $_REQUEST['cpf'];
        $_query = "SELECT * FROM Membro WHERE cpf='$_cpf'";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_nome = $_resultado['nome'];
        $_rg = $_resultado['RG'];
        $_tel = $_resultado['tel'];
        $_email = $_resultado['email'];
        $_dNasci = $_resultado['dataNascimento'];
        $_dBat = $_resultado['dataBatismo'];
        $_natu = $_resultado['naturalidade'];
        $_end = $_resultado['endereco'];
    }else{
        header('location:../html/mainMembros.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Membro</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type='text/javascript' src="../js/masks.js"></script>
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
                <spam class="fontTitulo">Alterar Membro</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarMembro.php">
                        <input type='hidden' name="cpfLogin" value='<?php echo $_cpf;?>'>
                        <spam class="font1">Nome:</spam> <input type="text" name="nome" onkeypress='mask_nome(frm1.nome)' value ="<?php echo $_nome ?>" required><br>
                        <spam class="font1">Telefone:</spam> <input type="text" name="tel" maxlength='16' onkeypress='mask_tel(frm1.tel)' onblur='validarTel(frm1.tel)' id='tel' value ="<?php echo $_tel ?>" required><br>
                        <spam class="font1">CPF:</spam> <input type="text" id='cpf' name="cpf" maxlength='14' onkeypress='mask_cpf(frm1.cpf)' value ="<?php echo $_cpf ?>" disabled><br>
                        <spam class="font1">RG:</spam> <input type="text" id='rg' name="rg" maxlength='12' onkeypress='mask_rg(frm1.rg)' onblur='validarRg(frm1.rg)' value ="<?php echo $_rg ?>" required><br>
                        <spam class="font1">Naturalidade:</spam><input type="text" name='naturalidade' value ="<?php echo $_natu ?>" required><br>
                        <spam class="font1">Endereço:</spam> <input type="text" name="endereco" value ="<?php echo $_end ?>" required><br>
                        <spam class="font1">Data Nascimento:</spam> <input type="date" name="dNascimento" value ="<?php echo $_dNasci ?>" required><br>
                        <spam class="font1">Data Batismo:</spam> <input type="date" name="dBatismo" value ="<?php echo $_dBat ?>" required><br>
                        <spam class="font1">Email:</spam> <input type="email" name="email" value ="<?php echo $_email ?>" required><br>
                        <?php

                        ?>
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