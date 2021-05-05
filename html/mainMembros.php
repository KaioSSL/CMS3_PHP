<?php
    include "../php/session_recup.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title> CMS - Membros</title>
        <link rel='stylesheet' type='text/css' href="../css/main.css">
        <script type="text/javascript" src="../js/ajaxRequest.js"></script>
        <script>
            window.onload = buscarMembros;
            function buscarMembros(){
                var ope = document.getElementById('op');
                var op= ope.options[ope.selectedIndex].value;
                var filtro = document.getElementById('filtro').value;
                AjaxRequest();
                
                Ajax.onreadystatechange = mostrarMembros;

                Ajax.open('POST', '../php/mainMembros.php?op='+op+"&filtro="+filtro,true);		

                Ajax.send(null);
        }
        
        function mostrarMembros() {
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

                    <select id="op" name="filtroMembros" class="selectFiltro">
                        <option value='1'>Nome</option>
                        <option value='2'>CPF</option>
                        <option value='3'>RG</option>
                        <option value='4'>Email</option>
                        <option value='5'>Telefone</option>
                    </select>
                    <input type='text' name='filtro' id="filtro" class='filtro' onkeyup="buscarMembros()"><br>
                    <a href="../html/cadastroMembro.php"><img src="../img/addContato.png" class="icon"></a>

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