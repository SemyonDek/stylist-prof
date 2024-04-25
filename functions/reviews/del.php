<?php
require_once('../../config/connect.php');

$idComm = $_POST['idComm'];

mysqli_query($ConnectDatabase, "DELETE FROM review WHERE `review`.`ID` = $idComm");

require_once('../../config/review.php');
?>

<div id="reviews-adm" class="reviews-list-block" style="width: 80%;">
    <?php
    addReviewsAdm($reviews, $products);
    ?>
</div>