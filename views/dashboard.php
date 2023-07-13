<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ../views/users/login.php");
    exit();
}


require_once 'header.php';
?>


<h1>Bienvenido <?php echo $user->name; ?></h1>



<?php require_once 'footer.php'; ?>