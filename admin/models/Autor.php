<?php
require_once 'config/database.php';

class Autor {
    private $conn;
    private $table = 'autores';

    public $id;
    public $nombre;
    public $correo;
    public $biografia;
    public $creado_en;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET nombre=:nombre, correo=:correo, biografia=:biografia";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->biografia = htmlspecialchars(strip_tags($this->biografia));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":biografia", $this->biografia);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nombre = $row['nombre'];
        $this->correo = $row['correo'];
        $this->biografia = $row['biografia'];
        $this->creado_en = $row['creado_en'];
    }

    public function update() {
        $query = "UPDATE " . $this->table . "
                SET
                    nombre = :nombre,
                    correo = :correo,
                    biografia = :biografia
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->biografia = htmlspecialchars(strip_tags($this->biografia));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':biografia', $this->biografia);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
