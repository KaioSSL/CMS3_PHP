<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Consagracao WHERE id=$_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_dsc = $_resultado['dsc'];
        
        
    }else{
        header('location:../html/mainConsagracoes.php');
        
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Alterar Consagração</title>
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
                <spam class="fontTitulo">Alterar Consagração</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarConsagracao.php">
                            <input type='hidden' value='<?php echo $_id; ?>' name='id'>
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
                             <textarea name="dsc" rows="10" cols="60" draggable="false"  required><?php echo $_dsc; ?></textarea>
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