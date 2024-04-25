<?php
require_once('../config/order.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/coupon.css">
    <link rel="stylesheet" href="../css/product-card.css">
    <link rel="stylesheet" href="../css/orders-adm.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <h2>Заказы</h2>
            <table class="table-coupon">
                <thead>
                    <tr>
                        <td class="number">№</td>
                        <td class="format">Кол-во товаров</td>
                        <td class="amount">Сумма</td>
                        <td class="phone">Телефон</td>
                        <td class="mail">Email</td>
                        <td class="status">Статус</td>
                        <td class="info">Информация</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    addOrderListAdm($orders);
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

<script src="../script/review-del.js"></script>

</html>