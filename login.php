<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php
    $loginpage = true;
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="breadcrumbs">
                <a href="index.php" class="breadcrumb-item">Главная страница</a>
                <span class="breadcrumbs-arrow">></span>
                <div class="breadcrumb-not-active">Авторизация</div>
            </div>

            <h1 class="title-catalog_h1">Авторизация</h1>

            <div class="login-body">
                <form id="login-form" action="">
                    <h3 class="title-basket">Вход на сайт</h3>
                    <div class="line-login-input">
                        <div class="name-login-input">Логин</div>
                        <input name="login" id="login" class="login-input" type="text">
                    </div>
                    <div class="line-login-input">
                        <div class="name-login-input">Пароль</div>
                        <input name="password" id="password" class="login-input" type="password">
                    </div>
                    <input id="logButton" class="login-btn" type="button" value="Войти">
                </form>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

<script>
    let logForm = document.getElementById("login-form"),
        logButton = document.getElementById("logButton");

    function login() {
        let formData = new FormData(logForm);

        var url = "functions/account/login.php";

        let xhr = new XMLHttpRequest();

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            if (xhr.response == "") {
                window.location.replace("account.php");
            } else {
                alert(xhr.response);
            }
        };
    }

    logButton.onclick = function() {
        login();
    };
</script>

</html>