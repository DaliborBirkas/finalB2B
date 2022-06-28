<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer/src/SMTP.php";
require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";


require_once "../database/db_config.php";
if (isset($_POST['reset'])){
    $selector=bin2hex(random_bytes(8));
  //  $token=random_bytes(32);
$token=1;

    $url="https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/createNewPassword.php?selector=".$selector."&validator=".$token;
    //today second since 1970+1800 seconds
    $experis= date("U")+1800;
    $userEmail= $_POST['email'];
  //  var_dump($selector,$token,$experis,$userEmail);
    $sql="DELETE FROM pwd_reset where pwd_reset_email=:email";
    $stmt=$connection->prepare($sql);
    if (!$stmt){

    }
    else{
        $stmt->bindParam(":email",$userEmail,PDO::PARAM_STR);
        $stmt->execute();
    }
    $sql="INSERT INTO pwd_reset(pwd_reset_email,pwd_reset_selector,pwd_reset_token,pwd_reset_expires) values (:email,:selector,:token,:expires)";
    $stmt=$connection->prepare($sql);
    if (!$stmt){
        echo "there was an error";
        exit();
    }
    else{
        //$hashedToken=password_hash($token,PASSWORD_DEFAULT);
        $stmt->bindParam(":email",$userEmail,PDO::PARAM_STR);
        $stmt->bindParam(":selector",$selector,PDO::PARAM_STR);
        $stmt->bindParam(":token",$token);
        $stmt->bindParam(":expires",$experis,PDO::PARAM_INT);
        $stmt->execute();
        header("Location:forgotPassword.php?reset=success");
    }
    try{



    $mail = new PHPMailer(true);

    $mail->setFrom('hamburgerija.pd@gmail.com');
    $mail->addAddress($userEmail);
    $mail->Subject = "Reset password";
    $mail->isHTML(true);
    $mail->Body = "
                        <html lang='en'>
                        <head>
                        <title>Verification</title>
                        </head>
                        <body>
                        Please<br>
                        Click on the link below to verify email
                        <a href='$url'>$url</a></body>
                        </html>
                        ";
    $mail->send();
    header("Location:forgotPassword.php?reset=success");


} catch (Exception $e) {


}


}
else{
    header('Location:../');
}