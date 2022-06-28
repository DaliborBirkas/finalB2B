<?php session_start();
require_once "../database/db_config.php";
unset($_SESSION['email']);
    $sql="SELECT * FROM city ORDER  BY city_name ASC";
        $stmt=$connection->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../script/customer/register-check-customer.js"></script>
    <style>

        div, input{
            border-radius: 25px;
        }
    

    </style>
</head>
<body>



<div class="container w-100 p-4 border border-disabled" id="container">
    <h3 style="text-align: center">Registruj se</h3>
    <p style="background-color: #909090; font-weight: bold; border-radius: 10px;" class="p-2 border border-dark">Registruj se - Popunite polja</p>
    <form class="form-row" method="post" action="checkRegister.php" id="register-form">
        <div>
        <div class="form-group m-2">
            <label for="name">Ime </label> <span style="color: red"><?php  ?></span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ime">
            <h5> <span class="text-danger" id="name-error"></span></h5>
        </div>
        <div class="form-group m-2">
            <label for="lastname">Prezime</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Prezime">
            <h5> <span class="text-danger" id="lastname-error"></span></h5>
        </div>
        <div class="form-group m-2">
            <label for="companyName">Ime firme</label>
            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Ime firme">
        </div>
        <div class="form-group m-2">
            <label for="email">E-mail </label><span style="color: red"><?php
              /*  if(isset($_COOKIE['kolac'])) {echo $_COOKIE['kolac'];}
                else{unset($_COOKIE['kolac']);}*/

                ?></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ime firme">
            <h5> <span class="text-danger" id="email-error"></span></h5>
        </div>
        <div class="form-group m-2">
            <label for="telephoneNumber">Broj telefona</label>
            <input type="number" class="form-control" id="telephoneNumber" name="telephoneNumber" placeholder="Broj telefona">
            <h5> <span class="text-danger" id="number-error"></span></h5>
        </div>
        </div>

        <div class="form-group m-2">
            <label for="companyAddress">Adresa firme</label>
            <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Adresa kompanije">
        </div>
       <div class="form-group m-2">
            <label for="companyCity">Grad </label>
            <select class="form-control" name="companyCity" id="companyCity">
                <?php
                foreach ($rows as $row){
                    echo '<option value="'.$row['id_city'].'">'.$row['city_name'].'</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group m-2">
            <label for="companyPib">PIB (poreski identifikacioni broj)</label>
            <input type="text" class="form-control" id="companyPib"  name="companyPib" placeholder="PIB">
        </div>
        <div class="form-group m-2">
            <label for="password">Lozinka</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Šifra">
            <h5> <span class="text-danger" id="password-error"></span></h5>
            <h5> <span class="text-danger" id="password-error3"></span></h5>
        </div>
        <div class="form-group m-2">
            <label for="repeaterPassword">Ponovite lozinku</label>
            <input type="password" class="form-control" id="repeaterPassword"  name="repeaterPassword" placeholder="Ponovite šifru">
            <h5> <span class="text-danger" id="password-error2"></span></h5>
            <h5> <span class="text-danger" id="password-error4"></span></h5>
        </div>
        <br>
        <input type="submit" name="submit" class="btn btn-primary">Registruj se</input>
        <br>
        <a href="login.php">Ukoliko imate nalog prijavite se ovde!</a>
    </form>
</div>




<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="../script/customer/register-check-customer.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>