<?php

class addCustomerLocal
{


    public function renderPage(){
define("SERVERNAME","localhost");
define("USERNAME","nevakcinisani");
define("PASSWORD","Y7pINIJQYFbsdqF");
define("DATABASE","nevakcinisani");
define("ENCODING","utf8");



try {
    $connection = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE.";charset=".ENCODING."", USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
        $sql="SELECT * FROM city ORDER  BY city_name ASC";
        $stmt=$connection->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        echo '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

        div, input{
            border-radius: 25px;
        }
           #container{
            width: 25%;
        }
        @media  (max-width: 900px) and (min-width: 500px){
        #container{
                width: 100%;
            }
        }

    </style>
</head>
<body>



<div class="container  p-4 border border-disabled" id="container">
    <h3 style="text-align: center">Registruj svoje prodavce</h3>
    <p style="background-color: #909090; font-weight: bold; border-radius: 10px;" class="p-2 border border-dark">Registruj svog prodavca</p>
    <form class="form-row" method="post" action="addCustomerLocalPage.php">
        <div>
            <div class="form-group m-2">
                <label for="name">Ime </label> <span style="color: red"><?php  ?></span>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ime">
            </div>
            <div class="form-group m-2">
                <label for="lastname">Prezime</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Prezime">
            </div>

            <div class="form-group m-2">
                <label for="email">E-mail </label><span style="color: red"></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email adresa">
            </div>
        </div>

        <div class="form-group m-2">
            <label for="companyAddress">Adresa </label>
            <input type="text" class="form-control" id="companyAddress" name="address" placeholder="Adresa ">
        </div>
        <div class="form-group m-2">
            <label for="companyCity">Grad </label>
            <select class="form-control" name="city" id="companyCity">
            ';

        foreach ($rows as $row){
            echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>';
        }
      //  header('Location:addCustomerLocal.php');
            echo '</select>
        </div>

        <div class="form-group m-2">
            <label for="password">Šifra</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Šifra">
        </div>
        <div class="form-group m-2">
            <label for="repeaterPassword">Ponovite šifru</label>
            <input type="password" class="form-control" id="repeaterPassword"  name="repeaterPassword" placeholder="Ponovite šifru">
        </div>
        <br>
        <a href="loadProducts.php">
        <button type="submit" name="submit" class="btn btn-primary">Registruj prodavca</button>
        </a>
        <a style="color:red" href="loadProducts.php"><h1 >Vrati se nazad</h1></a>
        <br>

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

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>';
    }
}
?>