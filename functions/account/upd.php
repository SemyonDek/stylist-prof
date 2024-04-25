<?php
session_start();

require_once('../../config/connect.php');

$nameUser = $_POST['name_user'];
$mailUser = $_POST['mail_user'];
$numberUser = $_POST['number_user'];

$idUser = $_SESSION['accountId'];

mysqli_query($ConnectDatabase, "UPDATE `users` SET 
`NAME` = '$nameUser',  `MAIL` = '$mailUser',
`NUMBER` = '$numberUser' WHERE `users`.`ID` = $idUser");
