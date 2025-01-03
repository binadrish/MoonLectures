<?php
$IDUSUARIO = $_POST['iduser'];
$USER = $_POST['user'];
$ROL = $_POST['role'];
session_start();
$_SESSION['S_IDUSER']=$IDUSUARIO;
$_SESSION['S_USER']=$USER;
$_SESSION['S_ROL']=$ROL;
?>