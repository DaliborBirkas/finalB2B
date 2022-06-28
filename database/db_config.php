<?php
require_once "config.php";

try {
    $connection = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE.";charset=".ENCODING."", USERNAME, PASSWORD);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}