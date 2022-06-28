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
    <title>Admin - edit proizvoda</title>
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

    <div class="container w-100 p-4">
        <form id="forms" method="post">
            <div class="form-group m-2">
                <label for="categoryId">Id kategorije</label>
                <input type="text" class="form-control" id="categoryId" name="categoryId">
            </div>
            <div class="form-group m-2">
                <label for="productName">Ime proizvoda</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>
            <div class="form-group m-2">
                <label for="productPrice">Cena proizvoda</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice">
            </div>
            <div class="form-group m-2">
                <label for="productDescription">Opis proizvoda</label>
                <input type="text" class="form-control" id="productDescription" name="productDescription">
            </div>
            <div class="form-group m-2">
                <label for="productBalance">Dostupna količina</label>
                <input type="text" class="form-control" id="productBalance" name="productBalance">
            </div>
            <div class="form-group m-2">
                <label for="productPicture">Slika</label>
                <input type="file" class="form-control" id="productPicture" name="productPicture">
            </div>

            <div class="form-group m-2">
                <input type="submit" value="Dodaj" name="sb" class="btn btn-info">
                <a href="admin-editProducts.php" class="btn btn-danger">Back</a>
            </div>
            <br>
        </form>
    </div>

    <?php


    if (isset($_POST['sb'])) {
        if (empty($_POST['categoryId']) || empty($_POST['productName']) || empty($_POST['productPrice']) || empty($_POST['productDescription']) || empty($_POST['productBalance']) || empty($_POST['productPicture'])) {
            echo "<p class='ms-5' align='center'>Popunite polja!</p>";
        } else {
           // global $dbh;

            $categoryId = intval($_POST['categoryId']);
            $productName = $_POST['productName'];
            $productPrice = intval($_POST['productPrice']);
            $productDescription = $_POST['productDescription'];
            $productBalance = $_POST['productBalance'];
            $productPicture = $_POST['productPicture'];

            $sql = "INSERT INTO product
        (id_category, name, price, description, balance, image)
         VALUES
        (:id_category,:new_name,:price,:description,:balance,:image)";

            $query = $connection->prepare($sql);
            $query->bindParam(':id_category', $categoryId, PDO::PARAM_INT);
            $query->bindParam(':new_name', $productName, PDO::PARAM_STR);
            $query->bindParam(':price', $productPrice, PDO::PARAM_INT);
            $query->bindParam(':description', $productDescription, PDO::PARAM_STR);
            $query->bindParam(':balance', $productBalance, PDO::PARAM_INT);
            $query->bindParam(':image', $productPicture, PDO::PARAM_STR);
            $query->execute();
            header("Location:admin-editProducts.php");
        }
    }
    ?>

    <?php
    require '../partials/footer.php';
    ?>
</body>

</html>