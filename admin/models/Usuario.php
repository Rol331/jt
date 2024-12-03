<?php
class Usuario {
    private $conn;
    private $table_name = "autores";

    public $id;
    public $nombre;
    public $correo;
    public $biografia;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login() {
        // Lógica para verificar el login del usuario
    }
}
?>
