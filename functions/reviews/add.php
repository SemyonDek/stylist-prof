<?php
session_start();
require_once('../../config/connect.php');

$prodid = $_POST['prodid'];
$name = $_POST['name'];
$date = date('d.m.Y') . ' г.';
$commtext =  $_POST['comm'];


mysqli_query($ConnectDatabase, "INSERT INTO `review` 
(`ID`, `PRODID`, `USER`, `DATE`, `COMM`) VALUES 
(NULL, '$prodid', '$name', '$date', '$commtext')");


require_once('../../config/review.php');
?>

<div id="rewiews-list-block" class="review-block">
    <?php
    addReviewsUser($reviews, $prodid);

    ?>
</div>