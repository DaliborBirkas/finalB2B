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
    <title>Admin - edit kategorije</title>
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
                <label for="categoryName">Ime kategorije</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName">
            </div>
            <div class="form-group m-2">
                <label for="parentId">Id roditelja</label>
                <input type="text" class="form-control" id="parentId" name="parentId">
            </div>
            <div class="form-group m-2">
                <input type="submit" value="Submit" name="sb" class="btn btn-info">
                <a href="admin-editCategory.php" class="btn btn-danger">Back</a>
            </div>
            <br>
        </form>
    </div>

    <?php



    if (isset($_POST['sb'])) {
        if (empty($_POST['categoryName']) || empty($_POST['parentId'])) {
            echo "<p class='ms-5' align='center'>Popunite polja!</p>";
        } else {

            $categoryName = $_POST['categoryName'];
            $parent_id = intval($_POST['parentId']);

            $sql = "INSERT INTO category
        (name, parent_id)
         VALUES
        (:new_name,:parent_id)";

            $query = $connection->prepare($sql);
            $query->bindParam(':new_name', $categoryName, PDO::PARAM_STR);
            $query->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
            $query->execute();
            header("Location:admin-editCategory.php");
        }
    }
    ?>
    <?php
    require '../partials/footer.php';
    ?>

</body>

</html>