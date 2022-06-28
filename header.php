<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../css/load-products.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="css/number-prefix.css">
    <title>Header</title>
    <style>
        table{
            margin: auto;
            width: 50%;
            border: 3px solid green;

            padding: 10px;
        }
    </style>
</head>
<body>
<header class="p-3 bg-warning text-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" id="navbarNav">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <ul><li><img src="https://nevakcinisani.proj.vts.su.ac.rs/B2B/img/logo.jpg" alt="Logo" style="width: 100px;height: 50px" alt="Logo"></li></ul>
                <li><a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B" class="nav-link px-2 text-dark">Početna</a></li>
              <?php
                    if (isset($_SESSION['idUser']) || isset($_SESSION['idUserLocal'])){


                    ?>
                <li><a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/loadProducts.php" class="nav-link px-2 text-dark">Proizvodi</a></li>
            <?php }
            else{
            ?>
            <li><a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php" class="nav-link px-2 text-dark">Proizvodi</a></li>
            <?php }
            ?>
                <li><a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/#about" class="nav-link px-2 text-dark">O nama</a></li>
                <li><a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/#footer" class="nav-link px-2 text-dark">Kontakt</a></li>
            </ul>
                <?php if(isset($_SESSION['name'])){
                    echo '<h3 style="color:red"> Dobro dosli ' .$_SESSION["name"].'  </h3>';
                ?>

                  <?php
                    if (isset($_SESSION['idUser']) && isset($_SESSION['idUserLocal'])){


                    ?>
                    <?php } else{
                       $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if ($actual_link=="https://nevakcinisani.proj.vts.su.ac.rs/B2B/"){
                        ?>
                        <div class="text-success"><a href="guest/addCustomerLocalPage.php" class="btn btn-outline-dark me-2">Dodaj lokal</a></div>
            <div class="text-end">
                            <a href="guest/logout.php" class="btn btn-outline-dark me-2">Izloguj se</a>
                        </div>
                        <?php
                    }
                    else {
                      ?>
                        <div class="text-success"><a href="addCustomerLocalPage.php" class="btn btn-outline-dark me-2">Dodaj lokal</a></div>
            <div class="text-end">
                            <a href="logout.php" class="btn btn-outline-dark me-2">Izloguj se</a>
                        </div>
                        <?php  
                    }
                    }
                        ?>
                  

                    <?php
                }
                else{
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if ($actual_link=="https://nevakcinisani.proj.vts.su.ac.rs/B2B/"){
                    ?>
                    <div class="text-end">
                        <a href="guest/login.php" class="btn btn-outline-dark me-2">Uloguj se</a>
                        <a href="guest/register.php" class="btn btn-outline-dark">Registruj se</a>
                    </div>
                    <?php
                    }
                    else{
                        ?>
                        <div class="text-end">
                            <a href="../guest/login.php" class="btn btn-outline-dark me-2">Uloguj se</a>
                            <a href="../guest/register.php" class="btn btn-outline-dark">Registruj se</a>
                        </div>
                        <?php
                    }
                }
                ?>

        </div>
    </div>
</header>
