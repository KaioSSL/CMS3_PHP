<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Desligamento WHERE id = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_dsc = $_resultado['dsc'];
    }else{
        header('location:../html/mainDesligamentos.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Desligamento</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
    </head>
    <body>
        <div class="boxPrincipal">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxContent">
                <div class="contentBar">
                    <a href="../html/mainDesligamentos.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Alterar Desligamento</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarDesligamento.php">
                            <input type='hidden' value='<?php echo $_id; ?>' name='id'>
                            <spam class="font1">Data Desligamento:</spam> <input type="date" name="dDesligamento" required>
                            <br>
                            <spam class="font1">Descrição:</spam>
                            <br>
                            <textarea name="dsc" rows="10" cols="60" draggable="false" value='' required><?php echo $_dsc; ?></textarea>
                            <br>
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