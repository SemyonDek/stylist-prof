<?php
require_once('config/basket.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="css/basket.css">
</head>

<body>

    <?php
    $orderPage = true;
    require_once('header.php');
    if (isset($_SESSION['accountName']) || $_SESSION['accountName'] == 'user') {
        $accountid = $_SESSION["accountId"];
        $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
        $usersData = mysqli_fetch_assoc($usersData);
    }
    ?>

    <main>
        <div class="container">
            <div class="breadcrumbs">
                <a href="index.php" class="breadcrumb-item">Главная страница</a>
                <span class="breadcrumbs-arrow">></span>
                <div class="breadcrumb-not-active">Моя корзина</div>
            </div>

            <div class="coupon-block">
                <form id="couponForm" action="">
                    <div class="mailing-form__wrapper">
                        <input class="mailing-form__field" type="text" name="coupon" id="coupon" placeholder="Введите код купона для скидки">
                        <input class="mailing-form__button" type="button" value="применить купон" onclick="addCoupon()">
                    </div>
                </form>
                <div class="button__block" style="width: unset;">
                    <a href="index.php" class="basket-section__btn btn footer_btn--continue">Продолжить покупки</a>
                </div>
            </div>

            <div class="basket-block">
                <div class="title-basket">
                    <p class="title-basket-text">
                        В корзине
                        <?php

                        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['countBasket']) && $_SESSION['countBasket'] > 0) {
                        ?>
                            <span id="count-products-basket"><?= $_SESSION['countBasket'] ?></span>
                        <?php
                        } else {
                        ?>
                            <span id="count-products-basket">0</span>

                        <?php
                        }
                        ?>
                        товара на сумму
                        <?php

                        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['basketSum']) && $_SESSION['basketSum'] > 0) {
                        ?>
                            <span id="amount-products-basket"><?= $_SESSION['basketSum'] ?></span>
                        <?php
                        } else {
                        ?>
                            <span id="amount-products-basket">0</span>

                        <?php
                        }
                        ?>
                        <span class="price-rouble"></span>
                        co скидкой
                        <?php

                        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['SALE']) && $_SESSION['SALE'] > 0) {
                        ?>
                            <span id="sale-value"><?= $_SESSION['SALE'] ?>%</span>
                        <?php
                        } else {
                        ?>
                            <span id="sale-value">0%</span>

                        <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="basket-table-block">
                    <table>
                        <thead>
                            <tr>
                                <td class="product">Наименование</td>
                                <td class="price">Цена</td>
                                <td class="value">Количество</td>
                                <td class="amount">Сумма</td>
                                <td class="del"></td>
                            </tr>
                        </thead>
                        <tbody id="basket-tbody">
                            <?php
                            if (isset($_SESSION['basket']) && $_SESSION['basket'] !== []) {
                                addBasket($_SESSION['basket'], $products, $photos);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <h1 class="title-catalog_h1">Оформление заказа</h1>
            <div class="order-main-block">
                <form id="order-form" action="">
                    <h2 class="title-order">Данные покупателя</h2>
                    <div class="line-order-input">
                        <div class="name-input-order">Ф.И.О.</div>
                        <input class="input-order" id="name_user" name="name_user" type="text" value="<?php if (isset($usersData)) echo $usersData['NAME'] ?>">
                    </div>
                    <div class="line-order-input">
                        <div class="name-input-order">Комментарий к заказу</div>
                        <input class="input-order" id="comm_user" name="comm_user" type="text">
                    </div>
                    <div class="line-order-input">
                        <div class="name-input-order">E-Mail</div>
                        <input class="input-order" id="mail_user" name="mail_user" type="text" value="<?php if (isset($usersData)) echo $usersData['MAIL'] ?>">
                    </div>
                    <div class="line-order-input">
                        <div class="name-input-order">Телефон</div>
                        <input class="input-order" id="number_user" name="number_user" type="text" value="<?php if (isset($usersData)) echo $usersData['NUMBER'] ?>">
                    </div>
                    <input class="add_order-button" type="button" value="Оформить заказ" onclick="addOrder()">
                </form>
            </div>

        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/basket.js"></script>
<script src="script/order.js"></script>

</html>