<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Cargar Composer si lo usas


class Model_User {
    private $conn;

    function __construct() {
        require_once 'mongoConnection.php';
        $this->conn = new MongoConnection();
        $this->conn->connect();  // Conectamos a la base de datos MongoDB
    }

    function VerifyUser($user, $pass) {
        // Seleccionamos la colección de usuarios
        $collection = $this->conn->conn->user; 

        // Buscamos el usuario en la colección
        $userFound = $collection->findOne(['email' => $user]);

        if ($userFound) {
            // Verificamos la contraseña utilizando password_verify
            if (password_verify($pass, $userFound['password'])) {
                return [$userFound];  // Devuelve el usuario encontrado como un arreglo
            }
        }
        return [];  // Retorna un arreglo vacío si no se encuentra el usuario o la contraseña es incorrecta
    }

    function CreateUser($name, $user, $pass){
        $collection = $this->conn->conn->user; 

        // Verificar si el usuario ya existe
        $existingUser = $collection->findOne(['email' => $user]);
        if ($existingUser) {
            return ['status' => 'error', 'message' => 'El usuario ya existe'];
        }

        // Generar el hash de la contraseña
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

        // Preparar los datos del usuario
        $newUser = [
            'email' => $user,
            'password' => $hashedPassword,
            'creation_date' => date('Y-m-d'),
            'last_update' => date('Y-m-d'),
            'name' => $name,
            'status' => 'active',
            'role' => 'user'
        ];

        // Insertar el nuevo usuario en la colección
        $result = $collection->insertOne($newUser);

        if ($result->getInsertedCount() === 1) {
            return ['status' => 'success', 'message' => 'Usuario creado correctamente', 'user_id' => $result->getInsertedId()];
        } else {
            return ['status' => 'error', 'message' => 'Error al crear el usuario'];
        }
    }
}
?>

