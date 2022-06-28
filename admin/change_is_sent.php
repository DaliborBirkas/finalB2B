<?php
require_once "../database/db_config.php";

session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:admin.php");
}

$id_order = $_GET['id_order'];
echo $id_order;



$sql = "UPDATE orders
    SET is_sent = 'Yes', is_sent = 1
    WHERE id_order = :id";

$query = $connection->prepare($sql);
if (!$query) {
    echo "error";
} else {
    $query->bindParam(':id', $id_order, PDO::PARAM_INT);
    $query->execute();
}
header("Location:admin-panel.php");
