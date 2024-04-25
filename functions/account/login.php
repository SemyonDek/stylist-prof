<?php
session_start();
require_once('../../config/connect.php');

$login = $_POST['login'];
$password = $_POST['password'];

if ($login == "admin" && $password == "a") {
    $_SESSION['accountName'] = 'admin';
} else {
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE LOGIN = '$login' AND PASSWORD = '$password'");
    $usersData = mysqli_fetch_all($usersData, MYSQLI_ASSOC);
    if ($usersData !== []) {
        $_SESSION['accountName'] = 'user';
        $_SESSION['accountId'] = $usersData[0]['ID'];
    } else {
        echo "Данные для входа не верны!";
    }
}
