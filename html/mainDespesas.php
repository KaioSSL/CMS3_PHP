<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Despesas</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src="../js/ajaxRequest.js"></script>
        <script>
            window.onload = buscarDespesas;
            function buscarDespesas(){
                var ope = document.getElementById('op');
                var op= ope.options[ope.selectedIndex].value;
                var filtro = document.getElementById('filtro').value;
                AjaxRequest();
                
                Ajax.onreadystatechange = mostrarDespesas;

                Ajax.open('POST', '../php/mainDespesas.php?op='+op+"&filtro="+filtro,true);		

                Ajax.send(null);
        }
        
        function mostrarDespesas() {
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
                        <option value='1'>Caixa</option>
                        <option value='2'>Setor</option>
                        <option value='3'>Data</option>
                        <option value='4'>Valor</option>
                        <option value='5'>Dia</option>
                        <option value='6'>Mes</option>
                        <option value='7'>Ano</option>
                    </select>
                    <input type='text' name='filtro' id="filtro" class='filtro' onkeyup="buscarDespesas()"><br>
                    <a href="../html/cadastroDespesa.php"><img src="../img/addDCD.png" class="icon"></a>

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