<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Cargar Composer si lo usas


class Model_User {
    private $conn;

    function __construct() {
        require_once 'mongoConnection.php';
        $this->conn = new MongoConnection();
        $this->conn->connect();  // Conectamos a la base de datos MongoDB
    }

    function VerificarUsuario($usuario, $contra) {
        // Seleccionamos la colección de usuarios
        $coleccion = $this->conn->conn->user; // Cambia 'usuarios' al nombre de tu colección

        // Buscamos el usuario en la colección
        $usuarioEncontrado = $coleccion->findOne(['email' => $usuario]);

        if ($usuarioEncontrado) {
            // Verificamos la contraseña utilizando password_verify
            if (password_verify($contra, $usuarioEncontrado['password'])) {
                return [$usuarioEncontrado];  // Devuelve el usuario encontrado como un arreglo
            }
        }
        return [];  // Retorna un arreglo vacío si no se encuentra el usuario o la contraseña es incorrecta
    }
}
?>
