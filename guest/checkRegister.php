<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require "../PHPMailer/src/SMTP.php";
//require "../PHPMailer/src/Exception.php";
//require "../PHPMailer/src/PHPMailer.php";
//require_once "../database/config.php";
//require_once "../database/db_config.php";
//session_start();
//
//
//if (isset($_POST['submit'])) {
//    $name = trim($_POST['name']);
//    $lastname = trim($_POST['lastname']);
//    $companyName = trim($_POST['companyName']);
//    $email = trim($_POST['email']);
//    $telephoneNumber = trim($_POST['telephoneNumber']);
//    $companyAddress = trim($_POST['companyAddress']);
//    $companyCity = trim($_POST['companyCity']);
//    $companyPib = trim($_POST['companyPib']);
//    $password = trim($_POST['password']);
//    $repeaterPassword = trim($_POST['repeaterPassword']);
//    $emailStatus = "not verified";
//    $balanceStart = 0;
//
//    var_dump($name);
//    var_dump($lastname);
//    var_dump($companyName);
//    var_dump($email);
//    var_dump($telephoneNumber);
//    var_dump($companyAddress);
//    var_dump($companyCity);
//    var_dump($companyPib);
//    var_dump($password);
//    var_dump($repeaterPassword);
//
//    if (empty($name) || empty($lastname) || empty($companyName) || empty($email) || empty($telephoneNumber) ||
//        empty($companyAddress) || empty($companyCity) || empty($companyPib) || empty($password) || empty($repeaterPassword)) {
//        //header("Location:register.php");
//        echo "tu sam 1";
//
//    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        //!preg_match("/^[a-zA-Z0-9]*$/",$username)
//        echo "tu sam 2";
//        // header("Location:register.php");
//    } else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
//        // $_SESSION['name']="Ime moze sadrzati samo slova";
//        // header("Location:register.php");
//        echo "tu sam 3";
//    } else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
//        //  unset($_SESSION['name']);
//        // header("Location:register.php");
//        echo "tu sam 4";
//    } else if ($password !== $repeaterPassword) {
//        echo '<script >';
//        echo 'alert("Both password has to be same");';
//        echo 'window.location.href="ls.php";';
//        echo '</script>';
//        exit();
//
//    } else {
//
//        $sql = "SELECT email FROM customer where email=:email ";
//        $stmt = $connection->prepare($sql);
//        if (!$stmt) {
//            exit();
//        } else {
//
//            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//            $stmt->execute();
//            $resultCheck = $stmt->rowCount();
//            if ($resultCheck > 0) {
//                // $_SESSION['emailCheck'] = "Korisnik sa ovakvim mejlom je vec registrovan kod nas, molim vas izaberite drugi mejl";
//                echo '<script >';
//                echo 'alert("Email already exists in database");';
//                echo 'window.location.href="register.php";';
//                echo '</script>';
//                exit();
//                // header("Location:register.php");
//            } else {
//                $sql = "INSERT INTO customer (name,lastname,email,email_status,activation_code,password,company_name,company_address,id_city,balance,pib,mobile_phone)
//                        values (:name,:lastname,:email,:email_status,:activation_code,:password,:company_name,:company_address,:id_city,:balance,:pib,:mobile_phone)";
//                $stmt = $connection->prepare($sql);
//                if (!$stmt) {
//                    exit();
//                } else {
//                    $token = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";
//                    $token = str_shuffle($token);
//                    $token = substr($token, 0, 10);
//
//                    //For now id_city same for all
//                    $id_city = 1;
//
//                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //bcrypt
//                    $user_activation_code = md5(rand());
//
//                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
//                    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
//                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//                    $stmt->bindParam(':email_status', $emailStatus, PDO::PARAM_STR);
//                    $stmt->bindParam(':activation_code', $token, PDO::PARAM_STR);
//                    $stmt->bindParam(':password', $hashedPwd, PDO::PARAM_STR);
//                    $stmt->bindParam(':company_name', $companyName, PDO::PARAM_STR);
//                    $stmt->bindParam(':company_address', $companyAddress, PDO::PARAM_STR);
//                    $stmt->bindParam(':id_city', $id_city, PDO::PARAM_INT);
//                    $stmt->bindParam(':balance', $balanceStart, PDO::PARAM_INT);
//                    $stmt->bindParam(':pib', $companyPib, PDO::PARAM_INT);
//                    $stmt->bindParam(':mobile_phone', $telephoneNumber, PDO::PARAM_STR);
//                    $stmt->execute();
//
//
//
//                }
//
//            }
//        }
//
//
//}
//}
//else{
//    exit();
//}
//
//
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer/src/SMTP.php";
require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
require_once "../database/config.php";
require_once "../database/db_config.php";
session_start();


if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $companyName = trim($_POST['companyName']);
    $email = trim($_POST['email']);
    $telephoneNumber = trim($_POST['telephoneNumber']);
    $companyAddress = trim($_POST['companyAddress']);
    $companyCity = trim($_POST['companyCity']);
    $companyPib = trim($_POST['companyPib']);
    $password = trim($_POST['password']);
    $repeaterPassword = trim($_POST['repeaterPassword']);
    $emailStatus = "not verified";
    $balanceStart = 0;

    var_dump($name);
    var_dump($lastname);
    var_dump($companyName);
    var_dump($email);
    var_dump($telephoneNumber);
    var_dump($companyAddress);
    var_dump($companyCity);
    var_dump($companyPib);
    var_dump($password);
    var_dump($repeaterPassword);

    if (empty($name) || empty($lastname) || empty($companyName) || empty($email) || empty($telephoneNumber) ||
        empty($companyAddress) || empty($companyCity) || empty($companyPib) || empty($password) || empty($repeaterPassword)) {
        //header("Location:register.php");
      //  echo "tu sam 1";

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        /*!preg_match("/^[a-zA-Z0-9]*$/",$username)*/
       // echo "tu sam 2";
        // header("Location:register.php");
    } else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        // $_SESSION['name']="Ime moze sadrzati samo slova";
        // header("Location:register.php");
      //  echo "tu sam 3";
    } else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        //  unset($_SESSION['name']);
        // header("Location:register.php");
      //  echo "tu sam 4";
    } else if ($password !== $repeaterPassword) {
        echo '<script >';
        echo 'alert("Lozinke moraju biti iste");';
        echo 'window.location.href="ls.php";';
        echo '</script>';
        exit();

    } else {

        $sql = "SELECT email FROM customer where email=:email ";
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            exit();
        } else {

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $resultCheck = $stmt->rowCount();
            echo"nema nista";
            if ($resultCheck > 0) {
                // $_SESSION['emailCheck'] = "Korisnik sa ovakvim mejlom je vec registrovan kod nas, molim vas izaberite drugi mejl";
                echo '<script >';
                echo 'alert("Email already exists in database");';
                echo 'window.location.href="register.php";';
                echo '</script>';
                exit();
                // header("Location:register.php");
            } else {
                $sql = "INSERT INTO customer (name,lastname,email,email_status,activation_code,password,company_name,company_address,id_city,balance,pib,mobile_phone)
                        values (:name,:lastname,:email,:email_status,:activation_code,:password,:company_name,:company_address,:id_city,:balance,:pib,:mobile_phone)";
                $stmt = $connection->prepare($sql);
                if (!$stmt) {
                    exit();
                } else {
                  //  echo"token";
                    $token = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 10);

                    //For now id_city same for all
                    $id_city = 1;

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //bcrypt
                    $user_activation_code = md5(rand());
                  /*  var_dump($name);
                    var_dump($lastname);
                    var_dump($companyName);
                    var_dump($email);
                    var_dump($telephoneNumber);
                    var_dump($companyAddress);
                    var_dump($companyCity);
                    var_dump($companyPib);
                    var_dump($password);
                    var_dump($repeaterPassword);*/
                    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                    $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
                    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                    $stmt->bindParam(":email_status", $emailStatus, PDO::PARAM_STR);
                    $stmt->bindParam(":activation_code", $token, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $hashedPwd, PDO::PARAM_STR);
                    $stmt->bindParam(":company_name", $companyName, PDO::PARAM_STR);
                    $stmt->bindParam(":company_address", $companyAddress, PDO::PARAM_STR);
                    $stmt->bindParam(":id_city", $id_city, PDO::PARAM_INT);
                    $stmt->bindParam(":balance", $balanceStart, PDO::PARAM_INT);
                    $stmt->bindParam(":pib", $companyPib, PDO::PARAM_INT);
                    $stmt->bindParam(":mobile_phone", $telephoneNumber, PDO::PARAM_STR);
                    $stmt->execute();
                    header("Location:loadProducts.php");
                    try {



                        $base_url = "https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/confirm.php?email=$email&token=$token";
                        $mail_body = "
                         <p>Hi " . $_POST['name'] . ",</p>
                        <p>Thanks for registration.Your password is " . $password . ", This passwrod will work only after your email verification</p>
                        <p>Please open this ling to verife your emaill address - " . $base_url . "
                        email_verification.php?activation=code" . $user_activation_code . "
                        <p>Best Regards,<br />Birki
                        </p>
                        ";


                        $mail = new PHPMailer(true);

                        $mail->setFrom('koznagalenterija@gmail.com', "$name");
                        $mail->addAddress($email, $name);
                        $mail->Subject = "Please verify email";
                        $mail->isHTML(true);
                        $mail->Body = "
                        <html lang='en'>
                        <head>
                        <title>Verification</title>
                        </head>
                        <body>
                        Postovani, <br>
                        Kako bi ste verifikovali vas nalog, molim vas<br>
                        Kliknite na  KLIKNI ME
                        <a href='$base_url'>KLIKNI ME</a><br>
                        <br>
                        <h4>Pozdrav</h4>
                        <h4>Dalibor Birkas</h4>
                        <h4>Kozna galenterija/h4>
                        <h4>Web developer</h4>
                        <h4>Za sva vasa pitanja stojimo na raspologanju/h4>
                        <h4>Kontakt: 060-600-900</h4>
                        
                        </body>
                        </html>
                        ";
                        $mail->send();

                        echo '<script >';
                        echo 'alert("Uspesno kreiran korisnik i poslat mejl porukaje mozda u spamu");';
                        echo 'window.location.href="login.php";';
                        echo '</script>';

                    } catch (Exception $e) {
                        echo '<script >';
                        echo 'alert("Mejl je nemoguce poslati);';
                        echo 'window.location.href="register.php";';
                        echo '</script>';
                        exit();
                    }



                }

            }
        }


    }
}
else{
    exit();
}

