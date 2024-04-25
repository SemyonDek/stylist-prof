<?php
require_once('../../config/connect.php');

$statusOrder = $_POST['statusOrder'];
$idOrder = $_POST['idOrder'];

mysqli_query($ConnectDatabase, "UPDATE `orders` SET `STATUS` = '$statusOrder' WHERE `orders`.`ID` = $idOrder");
