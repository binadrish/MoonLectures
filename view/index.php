<?php
    session_start();
    if(!isset($_SESSION['S_IDUSER'])){
        header('Location: login.php');
        exit; // Detener la ejecución del resto del script
    }else{
        echo "hola buen día";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <a href="../controller/user/controller_close_session.php" class="btn btn-default btn-flat">Salir</a>
</body>
</html>