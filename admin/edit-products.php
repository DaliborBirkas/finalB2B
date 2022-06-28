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
<style>
   
</style>
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
    <?php

    $id_product = intval($_GET['id_product']);
    $categoryId = intval($_GET['id_category']);
    $productName = $_GET['name'];
    $productPrice = intval($_GET['price']);
    $productDescription = $_GET['description'];
    $productBalance = intval($_GET['balance']);

    $sql = "SELECT * FROM product WHERE id_product= {$id_product}";
    $query = $connection->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC




    ?>


    <div class="container w-100 p-4">
        <form id="forms" method="post">
            <div class="form-group m-2">
                <label for="categoryId">Id proizvoda</label>
                <input type="text" class="form-control" id="categoryId" name="categoryId" value="<?php echo $id_product ?>" disabled>
            </div>
            <div class="form-group m-2">
                <label for="categoryId">Id kategorije</label>
                <input type="text" class="form-control" id="categoryId" name="categoryId" value="<?php echo $categoryId ?>" disabled>
            </div>
            <div class="form-group m-2">
                <label for="productName">Ime proizvoda</label>
                <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $productName ?>">
            </div>
            <div class="form-group m-2">
                <label for="productPrice">Cena proizvoda</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice" value="<?php echo $productPrice ?>">
            </div>
            <div class="form-group m-2">
                <label for="productDescription">Opis proizvoda</label>
                <input type="text" class="form-control" id="productDescription" name="productDescription" value="<?php echo $productDescription ?>">
            </div>
            <div class="form-group m-2">
                <label for="productBalance">Dostupna količina</label>
                <input type="text" class="form-control" id="productBalance" name="productBalance" value="<?php echo $productBalance ?>">
            </div>
            <div class="form-group m-2">
                <label for="productPicture">Slika</label>
                <input type="file" class="form-control" id="productPicture" name="productPicture">
            </div>

            <div class="form-group m-2">
                <input type="submit" value="Promeni" name="sb" class="btn btn-success">
            </div>
            <br>
        </form>
    </div>


    <?php
    if (isset($_POST['sb'])) {
        var_dump($id_product);
        $productNameNew = $_POST['productName'];
        $productPriceNew = intval($_POST['productPrice']);
        $productDescriptionNew = $_POST['productDescription'];
        $productBalanceNew = $_POST['productBalance'];
        $productPictureNew = $_POST['productPicture'];

        // $sql = "UPDATE product
        //     SET id_category=:id_category, name=:new_name, price=:price, description=:description, balance=:balance, image=:image
        //     WHERE id_product = :id_Product";

        $sql = "UPDATE product
                SET name=:new_name, price=:new_price, description=:new_description, balance=:new_balance, image=:new_image
                WHERE id_product = {$id_product}";

        $query = $connection->prepare($sql);
        if (!$query) {
            echo "error";
        } else {
            $query->bindParam(':new_name', $productNameNew, PDO::PARAM_STR);
            $query->bindParam(':new_price', $productPriceNew, PDO::PARAM_INT);
            $query->bindParam(':new_description', $productDescriptionNew, PDO::PARAM_STR);
            $query->bindParam(':new_balance', $productBalanceNew, PDO::PARAM_INT);
            $query->bindParam(':new_image', $productPictureNew, PDO::PARAM_STR);
            $query->execute();
        }
        header("Location:admin-editProducts.php");
    }
    ?>

    <?php
    require '../partials/footer.php';
    ?>




</body>

</html>