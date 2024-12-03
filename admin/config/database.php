<?php
class Database {
    // Parámetros de la base de datos
    private $host = "localhost";
    private $db_name = "jt";
    private $username = "inacons";
    private $password = "inacons";
    public $conn;

    // Obtener la conexión de la base de datos
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
