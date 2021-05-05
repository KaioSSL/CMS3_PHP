<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Disciplina WHERE id = '$_id'";
        $_consulta = $_SQL->sql_query($_query);
        $_resutado = mysql_fetch_array($_consulta);
        $_dsc = $_resutado['dsc'];
    }else{
        header('location:../html/mainDisciplinas.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Disciplina</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
    </head>
    <body>
        <div class="boxPrincipal">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxContent">
                <div class="contentBar">
                    <a href="../html/mainDisciplinas.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Alterar Disciplina</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarDisciplina.php">
                            <input type='hidden' value='<?php echo $_id; ?>' name='id'>
                            <spam class="font1">Data Inicio:</spam> <input type="date" name="dInicio" required>
                            <br>
                            <spam class="font1">Data Fim:</spam> <input type="date" name="dFim" required>
                            <br>
                            <spam class="font1">Descrição: 
                            <br>
                            <textarea name="dsc" rows="10" cols="60" draggable="false"  required> <?php echo $_dsc; ?></textarea>
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