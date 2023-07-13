<?php
require_once '../db/connection.php';

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $role;  // Añadimos el atributo role
    //... otros atributos ...

    public static function findByEmail($email)
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $query->bindParam(":email", $email, PDO::PARAM_STR, 50);
        $query->execute();
        if ($query->errorCode() != 0) {
            print_r($query->errorInfo());
            exit();
        }
        if ($query->rowCount() == 0) return null;
        $user_data = $query->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        $user->id = $user_data['id'];
        $user->name = $user_data['nombre'];
        $user->email = $user_data['email'];
        $user->password = $user_data['password'];
        $user->role = $user_data['role'];  // Extraemos el role de la base de datos
        echo "<script>console.log('Query: " . $user_data['nombre'] . "');</script>";
        //... inicializar otros atributos ...
        return $user;
    }
    public static function findById($id) {
        global $conn;
        $query = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        if ($query->errorCode() != 0) {
            print_r($query->errorInfo());
            exit();
        }
        if ($query->rowCount() == 0) return null;
        $user_data = $query->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        $user->id = $user_data['id'];
        $user->name = $user_data['nombre'];
        $user->email = $user_data['email'];
        $user->password = $user_data['password'];
        $user->role = $user_data['role'];  // Extraemos el role de la base de datos
        //... inicializar otros atributos ...
        return $user;
    }
    

    //... otros métodos, como save, delete, etc. ...
}
