<?php

require '../../model/model_user.php';

try {
    // Instanciamos el modelo
    $MU = new Model_User();

    // Sanitizamos las entradas
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $user = htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
    
    if (empty($name) || empty($user) || empty($pass)) {
        echo json_encode(['status' => 'error', 'message' => 'Campos vacíos']);
        exit;
    }

    // Ejecutamos el query
    $query = $MU->CreateUser($name, $user, $pass);

    // Validamos la respuesta del modelo
    if ($query['status'] === 'success') {
        echo json_encode([
            'status' => 'success',
            'message' => $query['message'],
            'user_id' => (string)$query['user_id']
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => $query['message']
        ]);
    }

} catch (Exception $e) {
    // Manejo de excepciones
    error_log("Error en controlador: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Error interno del servidor']);
}
?>
