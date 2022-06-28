<?php
require_once "../database/db_config.php";
use PHPMailer\PHPMailer\PHPMailer;
require "../PHPMailer/src/SMTP.php";
require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
if (isset($_POST['resetPassword'])){
  //  echo '<script>alert("Poruka customer")</script>';
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    if (empty($password) || empty($passwordRepeat)){
    }
    elseif ($password != $passwordRepeat){

    }
    $currentDate= date("U");
    $sql="SELECT * FROM pwd_reset WHERE pwd_reset_selector=:selector and pwd_reset_expires>=:experis and 	pwd_reset_token=:pwdR";
    $stmt=$connection->prepare($sql);
    if (!$stmt){

    }
    else{
        $stmt->bindParam(":selector",$selector,PDO::PARAM_STR);
        $stmt->bindParam(":experis",$currentDate,PDO::PARAM_INT);
    $stmt->bindParam(":pwdR",$validator,PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()<=0){
     header("Location:https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php");
                    exit();
		
        }
        else{
       
        	$row=$stmt->fetch();
                $tokenEmail = $row['pwd_reset_email'];
                $sql= "SELECT * FROM customer where  email=:email";
                $stmt=$connection->prepare($sql);
                $stmt->bindParam(":email",$tokenEmail,PDO::PARAM_STR);
                $stmt->execute();
                if ($stmt->rowCount()>0){
                    $newPasswordHash=password_hash($password,PASSWORD_DEFAULT);
                    $sql="UPDATE customer SET password=:password where email=:email ";
                    $stmt=$connection->prepare($sql);
                    $stmt->bindParam(":email",$tokenEmail,PDO::PARAM_STR);
                    $stmt->bindParam(":password",$newPasswordHash,PDO::PARAM_STR);
                    $stmt->execute();
             

                    $sql="DELETE * FROM pwd_reset where pwd_reset_email=:email ";
                    $stmt=$connection->prepare($sql);
                    $stmt->bindParam(":email",$tokenEmail,PDO::PARAM_STR);
                    $stmt->execute();
         

                }
                else{
                    $sql= "SELECT * FROM customer_local where  email=:email";
                    $stmt=$connection->prepare($sql);
                    $stmt->bindParam(":email",$tokenEmail,PDO::PARAM_STR);
                    $stmt->execute();
                    if ($stmt->rowCount()>0){
                        $newPasswordHash=password_hash($password,PASSWORD_DEFAULT);
                        $sql="UPDATE customer_local SET password=:password where email=:email ";
                        $stmt=$connection->prepare($sql);
                        $stmt->bindParam(":email",$tokenEmail,PDO::PARAM_STR);
                        $stmt->bindParam(":password",$newPasswordHash,PDO::PARAM_STR);
                        $stmt->execute();
       

                        $sql="DELETE * FROM pwd_reset where pwd_reset_email=:email ";
                        $stmt=$connection->prepare($sql);
                        $stmt->bindParam(":email",$tokenEmail,PDO::PARAM_STR);
                        $stmt->execute();
               


                  
                    }
                   header("Location:https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php");
                    exit();
                }
       
         //   }
        }
     
    }

}
else{
          header("Location :../guest/login.php");

}