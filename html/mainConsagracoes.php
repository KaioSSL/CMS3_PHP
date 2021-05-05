<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Consagrações</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src="../js/ajaxRequest.js"></script>
        <script>
            window.onload = buscarConsagracoes;
            function buscarConsagracoes(){
                var ope = document.getElementById('op');
                var op= ope.options[ope.selectedIndex].value;
                var filtro = document.getElementById('filtro').value;
                AjaxRequest();
                
                Ajax.onreadystatechange = mostrarConsagracoes;

                Ajax.open('POST', '../php/mainConsagracoes.php?op='+op+"&filtro="+filtro,true);		

                Ajax.send(null);
        }
        
        function mostrarConsagracoes() {
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
                        <option value='2'>Cargo</option>
                        <option value='3'>Data Registro</option>
                        <option value='4'>Data Consagração</option>
                    </select>
                    <input type='text' name='filtro' id="filtro" class='filtro' onkeyup="buscarConsagracoes()"><br>
                    <a href="../html/cadastroConsagracao.php"><img src="../img/addDCD.png" class="icon"></a>

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