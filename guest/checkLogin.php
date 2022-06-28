<?php
session_start();
if (isset($_POST["login-submit"])){

    require  "../database/db_config.php";

    $mailuid=$_POST['username'];
    $password=$_POST['password'];
    $status="verified";

    if(empty($mailuid) && empty($password)){
        $_SESSION["no-parametars"]="Parametri ne mogu biti prazni prilikom logovanja";
        header("Location:login.php");
    }
    else{
        $sql="SELECT * FROM customer where  email=:email and email_status=:email_status ;";
        $stmt=$connection->prepare($sql);
        if (!$stmt){

            exit();
        }
        else{
            $stmt->bindParam(":email",$mailuid,PDO::PARAM_STR);
            $stmt->bindParam(":email_status",$status,PDO::PARAM_STR);
            /*  $stmt->bindParam(":status",$status,PDO::PARAM_STR);*/
            $stmt->execute();
            $rows=$stmt->fetch();
            var_dump($rows);
            if($row=$rows){
                $pwdCheck=password_verify($password,$row['password']);
                if($pwdCheck==false){

                    //pogresna lozinka

                   $_SESSION['pw-wrong']="Pogresna lozinka";
                 //  setcookie('cookie-pw-wrong','Pogresna lozinka',time()+10);
                   header("Location:login.php");
                }
                else if($pwdCheck==true){
                   /* session_start();
                    $_SESSION['userId']=$row['name'];
                    $_SESSION['userUid']=$row['id'];
                    $_SESSION['sendEmail']=$row['email'];
                    header("Location:ls.php?login=success");
                   */
                    $_SESSION['email']=$mailuid;
                    $_SESSION['idUser']=$row['id_customer'];
                    $_SESSION['name']=$row['name'];
                    header("Location:loadProducts.php");
                }

            }

            else{
                $sql="SELECT * FROM customer_local where  email=:email ;";
                $stmt=$connection->prepare($sql);
                $stmt->bindParam(':email', $mailuid, PDO::PARAM_STR);
                $stmt->execute();
                $resultCheck = $stmt->rowCount();
                $rows=$stmt->fetch();
                if ($resultCheck>0){
                    if ($row=$rows){
                        $pwdCheck=password_verify($password,$row['password']);
                        if($pwdCheck==false){

                            //pogresna lozinka

                            $_SESSION['pw-wrong']="Pogresna lozinka";
                            //  setcookie('cookie-pw-wrong','Pogresna lozinka',time()+10);
                            header("Location:login.php");
                        }
                        else if($pwdCheck==true){
                            /* session_start();
                             $_SESSION['userId']=$row['name'];
                             $_SESSION['userUid']=$row['id'];
                             $_SESSION['sendEmail']=$row['email'];
                             header("Location:ls.php?login=success");
                            */
                            $_SESSION['email']=$mailuid;
                            $_SESSION['idUser']=$row['id_customer'];
                            $_SESSION['idUserLocal']=$row['id_customer_local'];
                            $_SESSION['name']=$row['name'];
                            header("Location:loadProducts.php");
                        }
                    }

                }
                else{

                    $_SESSION['no-user']="Korisnik ne postoji";
                    header("Location:login.php");
                }



            }
        }

    }


}
else{

}