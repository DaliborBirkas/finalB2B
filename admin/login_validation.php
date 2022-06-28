<?php

session_start();


require_once "../database/db_config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {



    $email = $_POST['email'];
    $password = $_POST['password'];



    $stmt = $connection->prepare('SELECT * FROM admin WHERE email = :email');
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {

        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $Hashedpassword = $result->password;
        if (password_verify($password, $Hashedpassword)) {
            $_SESSION['admin_user'] = $result;
            header("Location:admin-panel.php");
        } else {
            echo 'Lose email ili password';
        }
    } else {
        echo 'Lose email ili password';
    }
} else {
    echo 'Connection error!';
}
