<?php
require_once "../database/db_config.php";
if (isset($_GET['email']) &&isset($_GET['token']) ){
    $email=$_GET['email'];
    $token=$_GET['token'];
    $status="verified";
echo"$token<br>";
echo "$email";
    $sql= "UPDATE customer SET email_status=:status where email=:email and activation_code=:code";
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':code', $token);
    $stmt->execute();
      
        header("Location:https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php");
    

}