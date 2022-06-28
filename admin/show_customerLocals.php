<?php
require_once "../database/db_config.php";
session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:admin.php");
}
// ovde ide lista porudzbina istorija od najnovijih (izlistavamo poslednjih 100 komada)
// kada kliknemo na porudzbinu onda da moze da se generise predracun i da se dodeli rabat
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - podkupci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>


    <header class="p-3 bg-warning text-light mb-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" id="navbarNav">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <ul>
                        <li><img src="../img/logo.jpg" alt="Logo" style="width: 100px;height: 50px"></li>
                    </ul>
                    <li><a href="admin-panel.php" class="nav-link px-2 text-dark">Porudžbine</a></li>
                    <li><a href="customer_customerLocal.php" class="nav-link px-2 text-dark">Kupci i podkupci</a></li>
                    <li><a href="admin-editCategory.php" class="nav-link px-2 text-dark">Modifikuj Kategorije</a></li>
                    <li><a href="admin-editProducts.php" class="nav-link px-2 text-dark">Modifikuj proizvode</a></li>
                </ul>

                <div class="text-end">
                    <a href="admin-logout.php" class="btn btn-outline-dark">Izloguj se</a>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <?php

        $id_customer = intval($_GET['id_customer']);
        //    $sql = "SELECT id_customer, name, lastname, company_name, company_address, balance FROM customer";
        // $sql = "SELECT * 
        //     FROM customer_local cl
        //     INNER JOIN customer  c ON cl.id_customer = c.id_customer
        //     WHERE cl.id_customer = :id";

        $sql = "SELECT * FROM customer_local WHERE id_customer = {$id_customer}";

        $query = $connection->prepare($sql);
        // $query->bindParam(':id', $id_customer, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC



        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo "</pre>";
        }

        ?>
        <div class="row justify-content-center">
            <?php

            if ($query->rowCount() > 0) : ?>
                <?php foreach ($results as $result) { ?>
                    <h1 class="m-3 text-center text-info">Lokali koje poseduje kupac <?php echo $id_customer ?></h1>
                    <?php break ?>
                <?php } ?>
            <?php endif; ?>

			<div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id kupca</th>
                        <th>Ime i prezime</th>
                        <th>Ime kompanije</th>
                        <th>Adresa kompanije</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php
                if ($query->rowCount() > 0) : ?>
                    <?php foreach ($results as $result) { ?>
                        <tr>
                            <td><?php echo $result->id_customer ?></td>
                            <td><?php echo $result->name . " " . $result->lastname ?></td>
                            <td><?php echo $result->city ?></td>
                            <td><?php echo $result->address ?></td>
                            <!--                        <td>--><?php //echo $result->balance 
                                                                ?>
                            <!--</td>-->
                            <td>
                                <a href="show_customerLocalOrders.php?id_customer=<?php echo $result->id_customer ?>" class="btn btn-success me-3">Vidi narudžbe</a>
                                <a href="customer_customerLocal.php" class="btn btn-danger me-3">Back</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php endif; ?>

            </table>
        </div>
        </div>
    </div>




    <?php
    include '../partials/footer.php';
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