<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Desligamentos</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src="../js/ajaxRequest.js"></script>
        <script>
            window.onload = buscarDesligamentos;
            function buscarDesligamentos(){
                var ope = document.getElementById('op');
                var op= ope.options[ope.selectedIndex].value;
                var filtro = document.getElementById('filtro').value;
                AjaxRequest();
                
                Ajax.onreadystatechange = mostrarDesligamentos;

                Ajax.open('POST', '../php/mainDesligamentos.php?op='+op+"&filtro="+filtro,true);		

                Ajax.send(null);
        }
        
        function mostrarDesligamentos() {
            if (Ajax.readyState == 4) {
                if (Ajax.status == 200) {
                    document.getElementById('boxTable').innerHTML = Ajax.responseText;
                    }			
                }
        }
        </script>
    </head>
    <body>
        <div class="boxPrincipal">
            <?php
                include "../php/menu.php";
            ?>
            <div class="boxContent">
                <div class="contentBar">

                    <select id="op" name="filtro" class="selectFiltro">
                        <option value='1'>CPF</option>
                        <option value='2'>Data</option>
                        <option value='3'>ID</option>
                    </select>
                    <input type='text' name='filtro' id="filtro" class='filtro' onkeyup="buscarDesligamentos()"><br>
                    <a href="../html/cadastroDesligamento.php"><img src="../img/addDCD.png" class="icon"></a>

                </div>
                <div class="boxTable" id="boxTable">
                    
                
                </div>
               <footer>
                    <h5>CMS - Church Management System é um Sistema desenvolvido e distribuído por @SYNMCALL. @ Copyright Todos os Direitos     Reservados.
                    </h5>
                </footer>
            </div>
        </div>
    
    
    </body>
</html>