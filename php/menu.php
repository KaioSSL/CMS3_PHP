<?php
    if($_SESSION['modoUsuario']==5){
        echo "<div class='boxMenu'>
            <!--<div class='boxIcon'>

                </div>!-->

                <div class='boxItens'>
                    <ul>
                        <li><a href='../html/mainMembros.php'>Membros</a></li>
                        <li><a href='../html/mainDisciplinas.php'>Disciplinas</a></li>
                        <li><a href='../html/mainConsagracoes.php'>Consagrações</a></li>
                        <li><a href='../html/mainDesligamentos.php'>Desligamentos</a></li>
                        <li><a href='../html/mainSetores.php'>Setores</a></li>
                        <li><a href='../html/mainCaixas.php'>Caixas</a></li>
                        <li><a href='../html/mainOfertas.php'>Ofertas</a></li>
                        <li><a href='../html/mainDizimos.php'>Dízimos</a></li>
                        <li><a href='../html/mainDespesas.php'>Despesas</a></li>
                        <li><a href='../html/mainUsuarios.php'>Usuarios</a></li>
                        <li><a href='../html/mainIgrejas.php'>Igrejas</a></li>
                        <li><a href='../php/sair.php'>Sair</a></li>
                    </ul>
                </div>
            </div>";
    }else{
                echo "<div class='boxMenu'>
                <!--<div class='boxIcon'>

                </div>!-->
                <div class='boxItens'>
                    <ul>
                        <li><a href='../html/mainMembros.php'>Membros</a></li>
                        <li><a href='../html/mainDisciplinas.php'>Disciplinas</a></li>
                        <li><a href='../html/mainConsagracoes.php'>Consagrações</a></li>
                        <li><a href='../html/mainDesligamentos.php'>Desligamentos</a></li>
                        <li><a href='../html/mainSetores.php'>Setores</a></li>
                        <li><a href='../html/mainCaixas.php'>Caixas</a></li>
                        <li><a href='../html/mainOfertas.php'>Ofertas</a></li>
                        <li><a href='../html/mainDizimos.php'>Dízimos</a></li>
                        <li><a href='../html/mainDespesas.php'>Despesas</a></li>
                        <li><a href='../php/sair.php'>Sair</a></li>
                    </ul>
                </div>
            </div>";
        
    }
?>