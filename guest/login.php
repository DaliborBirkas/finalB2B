<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link href="css/login-button.css" rel="stylesheet">
    <style>

        body {
            padding: 50px;
        }

        div, input{
            border-radius: 25px;
        }
 

    </style>
</head>
<body>



<div class="container w-100 p-4 border border-disabled" id="container">
    <h3 style="text-align: center">Log in</h3>
    <p style="background-color: #909090; font-weight: bold; border-radius: 10px;" class="p-2 border border-dark">Login - Unesite vaše parametre</p>
    <form method="post" action="checkLogin.php" id="login-form">
        <div class="form-group m-2 fw-bold">
            <label  for="username">Korisničko ime( e-mail adresa)</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Korisničko ime">
           <h5> <span class="text-danger" id="username-error"></span></h5>
        </div>
        <div class="form-group m-2 fw-bold">
            <label  for="password">Šifra</label>
            <input type="password" class="form-control" id="password"  name="password" placeholder="Šifra">
            <h5> <span  class="text-danger" id="password-error"></span></h5>
        </div>
        <div class="form-group m-2">
            <?php
            // Provera da li je setova sesija za pogresnu lozinku
            if(isset($_SESSION['pw-wrong'])){
                echo '<span id="pw-check-php" style="color: red; font-weight: bold;font-size: 15px;">'.$_SESSION["pw-wrong"].'<span>';
                unset($_SESSION["pw-wrong"]);

            }
           /* if (isset($_COOKIE['cookie-pw-wrong'])){
                echo '<span id="pw-check-php" style="color: red; font-weight: bold;font-size: 15px;">'.$_COOKIE["cookie-pw-wrong"].'<span>';
                var_dump($_COOKIE['cookie-pw-wrong']);
            }*/
            elseif (isset($_SESSION["no-user"])){
                echo '<span style="color: red; font-weight: bold;font-size: 15px;">'.$_SESSION["no-user"].'<span>';
                unset($_SESSION["no-user"]);
            }
            elseif(isset($_SESSION["no-parametars"])){
                echo '<span style="color: red; font-weight: bold;font-size: 15px;">'.$_SESSION["no-parametars"].'!<span>';
                unset($_SESSION["no-parametars"]);
            }
            ?>
        </div>

        <br>

         <input type="submit" name="login-submit" class="btn btn-primary">
        <br>
        <a href="register.php "class="p-3">Ukoliko nemate nalog morate da se registrujete!</a>
        <a href="forgotPassword.php" class="p-3">Zaboravili ste širfu?</a>
    </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="../script/customer/login-check-customer.js"></script>
<script src="../script/customer/login-clear-field-wrong-pw.js"></script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>-->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->

</body>
</html>