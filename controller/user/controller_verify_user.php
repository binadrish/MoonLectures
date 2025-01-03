<?php
require '../../model/model_user.php';

try {
    // Instanciamos el modelo
    $MU = new Model_User();

    // Sanitizamos las entradas
    $user = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');

    // Validamos que las entradas no estén vacías
    if (empty($user) || empty($pass)) {
        echo json_encode(['error' => 'Campos vacíos']);
        exit;
    }

    // Llamamos al modelo para verificar el usuario
    $query = $MU->VerificarUsuario($user, $pass);

    // Preparamos la respuesta
    if (count($query) > 0) {
        echo json_encode($query);
    } else {
        echo 0;
    }
} catch (Exception $e) {
    // Manejo de excepciones
    error_log("Error en controlador: " . $e->getMessage());
    echo json_encode(['error' => 'Error interno del servidor']);
}
?>
