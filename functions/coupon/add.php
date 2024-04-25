<?php

require_once('../../config/connect.php');

$code = $_POST['code'];
$sale = $_POST['sale'];

mysqli_query($ConnectDatabase, "INSERT INTO `coupon` (`ID`, `CODE`, `SALE`) VALUES (NULL, '$code', '$sale')");

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