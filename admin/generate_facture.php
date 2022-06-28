<?php
require_once "../database/db_config.php";
require_once __DIR__ . '/vendor/autoload.php';

session_start();

if (!isset($_SESSION['admin_user'])) {
    header("Location:admin.php");
}


$id_order = $_GET['id_order'];

$sql = "SELECT * FROM orders WHERE id_order='$id_order'";

$query = $connection->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC

$mdpf = new \Mpdf\Mpdf();

$data = '';

$data .= '<h1>Order Details</h1>';

foreach ($results as $result) {

    $data .= '<strong> Id_order </strong>' . $id_order . '<br>';
    $data .= '<strong> Order Note </strong>' . $result->order_note . '<br>';
    $data .= '<strong> Date </strong>' . $result->datetime . '<br>';
}

$mdpf->WriteHTML($data);
$mdpf->Output('predračun.pdf', 'D');
