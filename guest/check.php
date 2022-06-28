<?php
function rediredt(){
    header("Location:register.php");
}
if(!isset($_GET['email'])|| !isset($_GET['token'])){
    header('Location: register.php');
    exit();
}
else{

    $email=$_GET['email'];
    $token=$_GET['token'];
    $notv="not verified";
    $yesv="verified";
    $praza="";

    require_once "../database/config.php";
    require_once "../database/db_config.php";
    $sql="SELECT id_customer FROM customer where email=:email and activation_code=:token";
    $stmt=$connection->prepare($sql);
    if(!$stmt){
        exit();
    }
    else{
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':token',$token,PDO::PARAM_STR);

        $stmt->execute();
        if($stmt->rowCount()>0){
            echo "<span style='color: #0f0'></span>";
            $sql2="UPDATE customer SET email_status=:es, activation_code=:aa where email=:ema";
            $stmt2=$connection->prepare($sql2);
            $stmt2->bindParam(':ema',$email,PDO::PARAM_STR);
            $stmt2->bindParam(':aa',$praza,PDO::PARAM_STR);
            $stmt2->bindParam(':es',$yesv,PDO::PARAM_STR);




            $stmt2->execute();


        }
        else{
            rediredt();
        }
    }





}