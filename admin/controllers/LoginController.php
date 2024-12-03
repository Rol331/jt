<?php
require_once 'models/Usuario.php';

class LoginController {
    public function showLoginForm() {
        include 'views/login/form.php';
    }

    public function login() {
        // Lógica para autenticar al usuario
    }
}
?>
