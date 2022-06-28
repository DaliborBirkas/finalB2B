<?php
session_start();
require_once "addCustomerLocal.php";
require_once "insertCustomerLocal.php";
require_once "../database/db_config.php";
 $render=new addCustomerLocal();
 $render->renderPage();
 $insert=new insertCustomerLocal();
 $insert->insert();


?>