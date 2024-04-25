<?php
require_once('../config/coupon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/coupon.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <h2>Купоны</h2>

            <div class="coupon-block">
                <div class="block-input">
                    <p class="name-info">
                        Код купона:
                    </p>
                    <input id="code-coupon" name="code-coupon" class="name-input" type="text">
                    <p class="name-info">
                        Скидка:
                    </p>
                    <input id="sale-coupon" name="sale-coupon" class="name-input" type="number">
                    <input id="add-coupon-button" class="upd-button" type="button" value="Добавить">
                </div>
            </div>
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
        </div>
    </main>

</body>

<script src="../script/coupon.js"></script>

</html>