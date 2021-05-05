<?php
    include "../php/session_recup.php";
    include "../php/ConnectionFactory.php";
    if(isset($_REQUEST['id'])){
        $_SQL = new ConnectionFactory();
        $_id = $_REQUEST['id'];
        $_query = "SELECT * FROM Oferta WHERE idOferta = $_id";
        $_consulta = $_SQL->sql_query($_query);
        $_resultado = mysql_fetch_array($_consulta);
        $_valor = $_resultado['valor'];
        $_dsc = $_resultado['dscOferta'];
        $_idCaixa = $_resultado['idCaixa'];
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Cadastro de Oferta</title>
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
                    <a href="../html/mainOfertas.php"><img src="../img/voltar.png" class="icon"></a>
                </div>
                <spam class="fontTitulo">Cadastro de Ofertas</spam>
                <div class="boxDesk">
                    <div class="boxForm">
                        <form name="frm1" action="../php/alterarOferta.php">
                        <input type='hidden' value='<?php echo $_id; ?>' name='id'>
                        <input type='hidden' value='<?php echo $_idCaixa; ?>' name='idCaixa'>
                        <input type='hidden' value='<?php echo $_valor; ?>' name='valorAntigo'>
                        <spam class="font1">Valor:</spam> <input type="text" name="valor" onkeypress='isNumber(frm1.valor)' value='<?php echo $_valor; ?>'required>
                        <br>
                        <spam class='font1'>Descrição:</spam>
                        <br>
                        <textarea name="dsc" rows="10" cols="60" draggable="false"  required><?php echo $_dsc;  ?></textarea>
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