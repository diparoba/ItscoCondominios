<?php
require_once '../models/user.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class UserController {
    public function login($email, $password) {
        $user = User::findByEmail($email);
        if($user && password_verify($password, $user->password)) {
            session_start();
            $_SESSION["user_id"] = $user->id;
            $_SESSION["role"] = $user->role;
            switch($user->role) {
                case 'Admin':
                    header("Location: ../views/dashboard.php");
                    break;
                case 'Residente':
                    header("Location: ../views/residents/index.php");
                    break;
                case 'Propietario':
                    header("Location: ../views/properties/index.php");
                    break;
            }
            exit();
        } else {
            $error = "Email o contraseña incorrecta";
            require_once '../views/users/login.php';
        }
    }
    //... otros métodos, como register, logout, etc. ...
}

// Lógica de acción
$action = $_GET["action"] ?? 'login';
$userController = new UserController();

switch ($action) {
    case 'login':
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $userController->login($_POST["email"], $_POST["password"]);
        } else {
            require_once '../views/users/login.php';
        }
        break;
    //... otros casos para otras acciones ...
}
