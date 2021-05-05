<?php
	session_start();
	unset($_SESSION['usuario']);
    unset($_SESSION['modoUsuario']);
    unset($_SESSION['idIgreja']);
	header("location:../html/login.php");
?>