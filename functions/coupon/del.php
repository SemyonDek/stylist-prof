<?php

require_once('../../config/connect.php');

$id = $_POST['id'];

mysqli_query($ConnectDatabase, "DELETE FROM coupon WHERE `coupon`.`ID` = $id");

require_once('../../config/coupon.php');

?>

<table class="table-coupon">
    <thead>
        <tr>
            <td class="code">Код купона</td>
            <td class="sale">Скидка</td>
            <td class="del"></td>
        </tr>
    </thead>
    <tbody id="CouponTableBody">
        <?php
        addCouponList($coupon);
        ?>
    </tbody>
</table>