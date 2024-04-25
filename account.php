<?php
require_once('config/order.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/orders-adm.css">
    <link rel="stylesheet" href="css/basket.css">
</head>

<body>

    <?php
    $accountPage = true;
    require_once('header.php');
    $accountid = $_SESSION["accountId"];
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
    $usersData = mysqli_fetch_assoc($usersData);
    $ordersUser = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE USERID = '$accountid'");
    $ordersUser = mysqli_fetch_all($ordersUser, MYSQLI_ASSOC);
    ?>

    <main>
        <div class="container">
            <div class="breadcrumbs">
                <a href="index.php" class="breadcrumb-item">Главная страница</a>
                <span class="breadcrumbs-arrow">></span>
                <div class="breadcrumb-not-active">Аккаунт</div>
            </div>

            <h1 class="title-catalog_h1">Аккаунт</h1>

            <div class="order-main-block">
                <form id="user-form" action="">
                    <h2 class="title-order">Мои данные</h2>
                    <div class="line-order-input">
                        <div class="name-input-order">Ф.И.О.</div>
                        <input class="input-order" id="name_user" name="name_user" type="text" value="<?php if (isset($usersData)) echo $usersData['NAME'] ?>">
                    </div>
                    <div class="line-order-input">
                        <div class="name-input-order">E-Mail</div>
                        <input class="input-order" id="mail_user" name="mail_user" type="text" value="<?php if (isset($usersData)) echo $usersData['MAIL'] ?>">
                    </div>
                    <div class="line-order-input">
                        <div class="name-input-order">Телефон</div>
                        <input class="input-order" id="number_user" name="number_user" type="text" value="<?php if (isset($usersData)) echo $usersData['NUMBER'] ?>">
                    </div>
                    <input class="add_order-button" type="button" value="Изменить" onclick="updInfo()">
                </form>
            </div>
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

    <?php
    require_once('footer.php')
    ?>
</body>

<script>
    function updInfo() {
        let form = document.getElementById("user-form");
        const {
            elements
        } = form;

        const data = Array.from(elements)
            .filter((item) => !!item.name)
            .map((element) => {
                const {
                    name,
                    value
                } = element;

                return {
                    name,
                    value,
                };
            });

        style_input_red = "border-color: red;";
        style_input_gray = "border-color: #DADADA;";

        prov = true;

        data.forEach((element) => {
            if (element["value"] == "") {
                prov = false;
                document.getElementById(element["name"]).style = style_input_red;
            } else {
                document.getElementById(element["name"]).style = style_input_gray;
            }
        });

        if (!prov) return;

        let formData = new FormData(form);

        var url = "functions/account/upd.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            console.log(xhr.response);
            alert("Данные изменены");
        };
    }
</script>

</html>