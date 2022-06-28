<?php

class insertCustomerLocal
{

        public function insert(){
define("SERVERNAME","localhost");
define("USERNAME","nevakcinisani");
define("PASSWORD","Y7pINIJQYFbsdqF");
define("DATABASE","nevakcinisani");
define("ENCODING","utf8");



try {
    $connection = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE.";charset=".ENCODING."", USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //  echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
            if (isset($_POST['name']) && isset($_POST['lastname'])
                && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['city'])
                && isset($_POST['password']) && isset($_POST['repeaterPassword']))
            {
                $status="verified";
                $password=$_POST['password'];
                $passwordCheck=$_POST['repeaterPassword'];
                if ($password==$passwordCheck){

                    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                        if (ctype_alpha($_POST['name']) && ctype_alpha($_POST['lastname']) && ctype_alpha($_POST['city'])){
                            $email=$_POST['email'];
                            $name=$_POST['name'];
                            $lastname=$_POST['lastname'];
                            $address=$_POST['address'];
                            $city=$_POST['city'];

                            $sql = "SELECT email FROM customer_local where email=:email ";
                            $stmt = $connection->prepare($sql);
                            if (!$stmt) {
                                exit();
                            }else{
                                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                                $stmt->execute();
                                $resultCheck = $stmt->rowCount();
                                if ($resultCheck > 0) {
                                    echo '<script >';
                                    echo 'alert("Korisnik sa ovom email adresom vec postoji");';
                                    echo 'window.location.href="addCustomerLocalPage.php";';
                                    echo '</script>';
                                    exit();
                                }
                                else
                                {
                                    $sql = "SELECT email FROM customer where email=:email and email_status=:email_verified";
                                    $stmt = $connection->prepare($sql);
                                    $stmt->bindParam(":email",$mailuid,PDO::PARAM_STR);
                                    $stmt->bindParam(":email_verified",$status,PDO::PARAM_STR);
                                    $stmt->execute();
                                    $resultCheck = $stmt->rowCount();
                                    if ($resultCheck>0){
                                        echo '<script >';
                                        echo 'alert("Korisnik sa ovom email adresom vec postoji");';
                                        echo 'window.location.href="addCustomerLocalPage.php";';
                                        echo '</script>';
                                        exit();
                                    }
                                    else{
                                        $sql = "INSERT INTO customer_local (id_customer,name,lastname,email,password,city,address)
                                        values (:id_customer,:name,:lastname,:email,:password,:city,:address)";
                                        $stmt = $connection->prepare($sql);
                                        if (!$stmt) {
                                            exit();
                                        } else {
                                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT); //bcrypt
                                            $stmt->bindParam(":id_customer", $_SESSION['idUser'], PDO::PARAM_INT);
                                            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                                            $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
                                            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
                                            $stmt->bindParam(":password", $hashedPwd, PDO::PARAM_STR);
                                            $stmt->bindParam(":city", $city, PDO::PARAM_STR);
                                            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
                                            $stmt->execute();
                                            $_SESSION['newUser']="Uspesno kreiran prodavac ".$name;
                                            echo '<script >';
                                            echo 'alert("Uspesno krairan prodavac");';
                                           // echo 'window.location.href="addCustomerLocalPage.php";';
                                            echo '</script>';

                                        }
                                    }

                                }
                            }

                        }else{

                        }

                    }else{

                    }
                }
                else{

                }
            }
            else{

            }
        }
}