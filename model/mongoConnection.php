<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Cargar Composer si lo usas

class MongoConnection {
    private $uri;  // URI de conexión
    private $dbName;  // Nombre de la base de datos
    public $conn;
    
    public function __construct() {
        // Define tu URI de conexión y base de datos
        $this->uri = "mongodb://moon-admin:P1iMXN6u6B@localhost:27017";  // Tu connection string de MongoDB
        $this->dbName = "moon-lectures";  // Nombre de la base de datos
    }
    
    // Conectar a MongoDB
    function connect() {
        try {
            $this->conn = new MongoDB\Client($this->uri);
            // Seleccionar la base de datos
            $this->conn = $this->conn->selectDatabase($this->dbName);
        } catch (Exception $e) {
            die("Error al conectar con MongoDB: " . $e->getMessage());
        }
    }
    
    // Cerrar la conexión (aunque MongoDB maneja la conexión automáticamente)
    function close() {
        // MongoDB se cierra automáticamente cuando se termina la ejecución, pero puedes cerrar explícitamente si lo prefieres
        $this->conn = null;
    }
}
?>
