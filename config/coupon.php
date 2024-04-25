<?php
require_once('connect.php');
$coupon = mysqli_query($ConnectDatabase, "SELECT * FROM `coupon`");
$coupon = mysqli_fetch_all($coupon, MYSQLI_ASSOC);

function addCouponList($coupon)
{
    foreach ($coupon as $item) {
?>
        <tr>
            <td><?= $item['CODE'] ?></td>
            <td><?= $item['SALE'] ?>%</td>
            <td><input class="coupon-del" type="button" value="Удалить" onclick="delCoupon(<?= $item['ID'] ?>)"></td>
        </tr>
<?php
    }
}
