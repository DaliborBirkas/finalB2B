<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Početna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<?php
    include 'header.php';
?>


<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/2.jpg" style="height: 500px" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/1.jpg" style="height: 500px" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/3.png" style="height: 500px" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"  style="color:red;background-color: yellow">Prethoda slika</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"  style="color:red;background-color: yellow">Sledeca slika</span>
    </a>
</div>

<!-- paragraph with text -->
<div class="bg-warning p-4" style="text-align: center" id="about">
    <div class="container">
        <h1 style="color:red;">Prodavnica kozne galenterije</h2>
        <h3 class="mt-3" style="text-align: start">Kozna galenerija je osnova 2009 godine zbog ljubavi prema kozi. Ideja je nastala veoma slucajno. Vodimo se principom
    	dobar kvalitet, dobra cena. Svaki proizvod je izdradjen sa ljubavlju i paznjom. Nudimo mogucnost porucivanja na veliko, kao i partnerstvo sa vama. 
        Svaki vid dogovora je moguc. Pogledajte nase sve proizvode.
        Nudimo sve moguce proizvode od koze.
    	</h3>
    </div>
</div>

<!-- banners for category -->
<div class="row d-flex p-2 justify-content-center">
    <div class="col-md-3">
        <div class="card" style="width: 20rem;">
            <img src="img/privesci/1.png" class="card-img-top"style="height: 250px" alt="Slika kartica 1">
            <div class="card-body">
                <h5 class="card-title">Privezak kozna lopta crni</h5>
                <p class="card-text">Izdradjen i namenjen kao poklon fudbalerima i navijacima partizana.</p>
               <a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php" class="btn btn-danger">Kupi!</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 20rem;">
            <img src="img/privesci/2.png" class="card-img-top"style="height: 250px" alt="Slika kartica 2">
            <div class="card-body">
                <h5 class="card-title">Privezak kozna lopta crvena</h5>
                <p class="card-text">Izdradjen i namenjen kao poklon fudbalerima i navijacima zvezde</p>
             <a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php" class="btn btn-danger">Kupi!</a>
              
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 20rem;">
            <img src="img/privesci/kokoska.jpg" class="card-img-top" style="height: 250px" alt="Slika kartica 3">
            <div class="card-body">
                <h5 class="card-title">Privezak kokoska</h5>
                <p class="card-text">Izradjen na zanimljiv nacin sa pazljivom biranom kombinacijom</p>
             <a href="https://nevakcinisani.proj.vts.su.ac.rs/B2B/guest/login.php" class="btn btn-danger">Kupi!</a>
            </div>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
?>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
