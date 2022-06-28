<?php
require_once "../database/db_config.php";
session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:admin.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Proizvodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>

    <header class="p-3  bg-warning text-light mb-3">
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


        $sql = "SELECT * FROM product";
        $query = $connection->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC



        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo "</pre>";
        }

        ?>

        <div>
            <a href="add-product.php" class="btn btn-info">Dodaj proizvod</a>
        </div>
        <div class="row justify-content-center">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>id_product</th>
                        <th>id_category</th>
                        <th>ime proizvoda</th>
                        <th>cena</th>
                        <th>opis</th>
                        <th>dostupna količina</th>
                        <th>slika</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php
                if ($query->rowCount() > 0) : ?>
                    <?php foreach ($results as $result) { ?>
                        <tr>
                            <?php $slika=$result->image; ?>
                            <td><?php echo $result->id_product ?></td>
                            <td><?php echo $result->id_category ?></td>
                            <td><?php echo $result->name ?></td>
                            <td><?php echo $result->price . " RSD" ?></td>
                            <td><?php echo $result->description ?></td>
                            <td><?php echo $result->balance . " komada" ?></td>
                            <?php
                      //      echo '<script> alert("'.$slika.'")</script>'
                            ?>

                            <td><img src="../img/privesci/<?php echo $result->image ?>" alt="slika proizvoda" height="100px" width="100px"></td>
                            <td>

                                <a href="edit-products.php?id_product=<?php echo $result->id_product; ?>&id_category=<?php echo $result->id_category; ?>
                            &name=<?php echo $result->name; ?>&price=<?php echo $result->price; ?>&description=<?php echo $result->description; ?>
                            &balance=<?php echo $result->balance; ?>$image=<?php echo $result->image; ?>" class="btn btn-info">Edit</a>


                            </td>
                        </tr>
                    <?php } ?>
                <?php endif; ?>

            </table>
        </div>

            <?php

            //      DELETE DATA
            if (isset($_GET['delete'])) {

                $id_product = intval($_GET['delete']);
                //            $categoryId = intval($_POST['categoryId']);
                //            $productName = $_POST['productName'];
                //            $productPrice = intval($_POST['productPrice']);
                //            $productDescription = $_POST['productDescription'];
                //            $productBalance = $_POST['productBalance'];
                //            $productPicture = $_POST['productPicture'];

                $sql = "DELETE FROM product WHERE id_product=:id";
                $query = $connection->prepare($sql);
                $query->bindParam(':id', $id_product, PDO::PARAM_INT);
                $query->execute();
            }

            ?>

        </div>
    </div>

    <?php
    require '../partials/footer.php';
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>