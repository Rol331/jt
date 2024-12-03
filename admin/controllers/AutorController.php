<?php
require_once 'models/Autor.php';
require_once 'config/database.php';

class AutorController {
    private $db;
    private $autor;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->autor = new Autor($this->db);
    }

    public function index() {
        $result = $this->autor->read();
        include 'views/autor/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->autor->nombre = $_POST['nombre'];
            $this->autor->correo = $_POST['correo'];
            $this->autor->biografia = $_POST['biografia'];
            if ($this->autor->create()) {
                header('Location: index.php?action=index');
            } else {
                include 'views/autor/create.php';
            }
        } else {
            include 'views/autor/create.php';
        }
    }

    public function edit($id) {
        $this->autor->id = $id;
        $this->autor->readOne();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->autor->nombre = $_POST['nombre'];
            $this->autor->correo = $_POST['correo'];
            $this->autor->biografia = $_POST['biografia'];
            if ($this->autor->update()) {
                header('Location: index.php?action=index');
            } else {
                include 'views/autor/edit.php';
            }
        } else {
            include 'views/autor/edit.php';
        }
    }

    public function delete($id) {
        $this->autor->id = $id;
        if ($this->autor->delete()) {
            header('Location: index.php?action=index');
        } else {
            echo "Error al eliminar el autor.";
        }
    }
}
