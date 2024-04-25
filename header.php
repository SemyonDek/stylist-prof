<?php
session_start();
if (isset($accountPage) && (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'user')) {
    header('Location: login.php');
}
if (isset($orderPage) && (!isset($_SESSION['basket']) || $_SESSION['basket'] == [])) {
    header('Location: index.php');
}
if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'admin') {
    header('Location: admin');
}
if (isset($_SESSION['accountName']) && isset($loginpage)) {
    header('Location: account.php');
}

if (isset($_GET['prodid'])) {
    $viveProd = [];

    $viveProd['PRODID'] = $_GET['prodid'];

    if (isset($_SESSION['viewProdList']) && $_SESSION['viewProdList'] !== [] && $_SESSION['viewProdList'] !== '') {
        $viewProdList = $_SESSION['viewProdList'];
    } else $viewProdList = [];

    $prov = true;
    foreach ($viewProdList as $item) {
        if ($item['PRODID'] == $viveProd['PRODID']) {
            $prov = false;
            break;
        }
    }

    if ($prov) array_push($viewProdList, $viveProd);

    $countview = count($viewProdList);

    if ($countview > 4) {
        $countview = $countview - 3;
    } else {
        $countview = 1;
    }

    $_SESSION['viewProdList'] = $viewProdList;
}
?>

<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/header.css">

<header>
    <div class="container">

        <div class="numbers-header-block">
            <div class="number-header">+7 (812) 426-19-50</div>
            <div class="time-header">Ежедневно с 10:00 до 20:00 </div>
        </div>
        <div class="logo-block">
            <a href="index.php">
                <img src="img/main/logo.png" alt="">
            </a>
        </div>
        <div class="header-button-block">
            <div class="login-header-block">
                <a href="login.php">
                    <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.9063 14.0095C10.933 14.0095 10.9598 14.0095 10.992 14.0095C11.0027 14.0095 11.0134 14.0095 11.0241 14.0095C11.0402 14.0095 11.0616 14.0095 11.0777 14.0095C12.647 13.9826 13.9163 13.428 14.8536 12.3674C16.9157 10.0306 16.5729 6.02485 16.5354 5.64258C16.4015 2.77283 15.0518 1.39988 13.9377 0.759163C13.1076 0.279975 12.1381 0.0215366 11.0562 0H11.0187C11.0134 0 11.0027 0 10.9973 0H10.9652C10.3707 0 9.20306 0.0969145 8.08366 0.737627C6.9589 1.37834 5.58777 2.75129 5.45387 5.64258C5.41637 6.02485 5.07359 10.0306 7.13565 12.3674C8.06759 13.428 9.33696 13.9826 10.9063 14.0095ZM6.88392 5.77718C6.88392 5.76103 6.88927 5.74488 6.88927 5.73411C7.06602 1.87368 9.79222 1.4591 10.9598 1.4591H10.9812C10.992 1.4591 11.008 1.4591 11.0241 1.4591C12.4702 1.49141 14.9286 2.08366 15.0946 5.73411C15.0946 5.75026 15.0946 5.76641 15.1 5.77718C15.1054 5.81487 15.4803 9.47608 13.7771 11.4036C13.1022 12.1682 12.2024 12.545 11.0187 12.5558C11.008 12.5558 11.0027 12.5558 10.992 12.5558C10.9812 12.5558 10.9759 12.5558 10.9652 12.5558C9.78686 12.545 8.8817 12.1682 8.2122 11.4036C6.51435 9.48685 6.87856 5.80949 6.88392 5.77718Z" fill="black"></path>
                        <path d="M21.9985 20.6536C21.9985 20.6482 21.9985 20.6428 21.9985 20.6374C21.9985 20.5943 21.9931 20.5513 21.9931 20.5028C21.961 19.4367 21.8914 16.9439 19.5669 16.147C19.5508 16.1416 19.5294 16.1363 19.5133 16.1309C17.0978 15.5117 15.0893 14.1118 15.0679 14.0957C14.7411 13.8641 14.2912 13.9449 14.0609 14.2733C13.8306 14.6018 13.911 15.054 14.2377 15.2856C14.3287 15.3502 16.4604 16.8416 19.1277 17.5307C20.3756 17.9776 20.5149 19.3183 20.5524 20.5459C20.5524 20.5943 20.5524 20.6374 20.5577 20.6805C20.5631 21.165 20.531 21.9134 20.4453 22.3442C19.5776 22.8395 16.1765 24.5517 11.0027 24.5517C5.8502 24.5517 2.42772 22.8341 1.55469 22.3388C1.469 21.9081 1.43151 21.1597 1.44222 20.6751C1.44222 20.632 1.44757 20.5889 1.44757 20.5405C1.48507 19.3129 1.62432 17.9722 2.87227 17.5254C5.53955 16.8362 7.67123 15.3394 7.76228 15.2802C8.089 15.0487 8.16934 14.5964 7.93903 14.268C7.70872 13.9395 7.25882 13.8588 6.93211 14.0903C6.91068 14.1064 4.9129 15.5063 2.48664 16.1255C2.46521 16.1309 2.44914 16.1363 2.43308 16.1416C0.108578 16.9439 0.0389498 19.4367 0.00681382 20.4974C0.00681382 20.5459 0.0068137 20.5889 0.00145771 20.632C0.00145771 20.6374 0.00145771 20.6428 0.00145771 20.6482C-0.00389828 20.9281 -0.00925415 22.3657 0.274613 23.0872C0.328173 23.2272 0.424581 23.3456 0.553125 23.4264C0.713804 23.5341 4.56476 26 11.008 26C17.4513 26 21.3022 23.5287 21.4629 23.4264C21.5861 23.3456 21.6879 23.2272 21.7414 23.0872C22.0092 22.3711 22.0039 20.9335 21.9985 20.6536Z" fill="black"></path>
                    </svg>
                    <div>Кабинет</div>
                </a>
            </div>
            <div class="basket-header-block">
                <a href="basket.php">
                    <svg class="basket__icon" width="20" height="26" viewBox="0 0 20 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.9949 22.4748L18.5641 5.71043C18.5335 5.33824 18.232 5.05644 17.8794 5.05644H14.9361C14.8952 2.25971 12.698 0 10 0C7.30199 0 5.10475 2.25971 5.06387 5.05644H2.12059C1.7629 5.05644 1.46653 5.33824 1.43587 5.71043L0.00510998 22.4748C0.00510998 22.4961 0 22.5174 0 22.5387C0 24.4474 1.68114 26 3.75064 26H16.2494C18.3189 26 20 24.4474 20 22.5387C20 22.5174 20 22.4961 19.9949 22.4748ZM10 1.43558C11.9366 1.43558 13.5156 3.05194 13.5565 5.05644H6.44354C6.48441 3.05194 8.06336 1.43558 10 1.43558ZM16.2494 24.5644H3.75064C2.45273 24.5644 1.4001 23.6712 1.37966 22.5706L2.74911 6.49734H5.05876V8.6773C5.05876 9.07607 5.36536 9.39509 5.74859 9.39509C6.13183 9.39509 6.43843 9.07607 6.43843 8.6773V6.49734H13.5565V8.6773C13.5565 9.07607 13.8631 9.39509 14.2463 9.39509C14.6295 9.39509 14.9361 9.07607 14.9361 8.6773V6.49734H17.2458L18.6203 22.5706C18.5999 23.6712 17.5422 24.5644 16.2494 24.5644Z" fill="black"></path>
                    </svg>
                    <?php

                    if (isset($_SESSION['basket']) && $_SESSION['basket'] !== [] && isset($_SESSION['countBasket']) && $_SESSION['countBasket'] > 0) {
                    ?>
                        <span id="basket-count"><?= $_SESSION['countBasket'] ?></span>
                    <?php
                    } else {
                    ?>
                        <span id="basket-count">0</span>

                    <?php
                    }
                    ?>
                    <div>Корзина</div>
                </a>
            </div>
        </div>

    </div>
    <nav class="header-menu">
        <div class="container">
            <div class="catalog-block">
                <a href="category-list.php">
                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 0.772727C17 0.360606 16.6909 0 16.3303 0H0.669697C0.309091 0 0 0.360606 0 0.772727C0 1.23636 0.309091 1.54545 0.669697 1.54545H16.3303C16.6909 1.59697 17 1.23636 17 0.772727Z" fill="#FF003D"></path>
                        <path d="M0 6.38788C0 6.85152 0.309091 7.16061 0.669697 7.16061H14.7333C15.0939 7.16061 15.403 6.8 15.403 6.38788C15.403 5.92424 15.0939 5.61515 14.7333 5.61515H0.669697C0.309091 5.56364 0 5.92424 0 6.38788Z" fill="#FF003D"></path>
                        <path d="M0 11.9515C0 12.4151 0.309091 12.7242 0.669697 12.7242H13.1364C13.497 12.7242 13.8061 12.3636 13.8061 11.9515C13.8061 11.4879 13.497 11.1788 13.1364 11.1788H0.669697C0.309091 11.1273 0 11.4879 0 11.9515Z" fill="#FF003D"></path>
                    </svg>
                    <span>Каталог товаров</span>
                </a>
            </div>
            <div class="search-block">
                <form class="tablet-search-form" action="search.php">
                    <div class="bx-searchtitle2">
                        <p class="tablet-search-form__wrapper">
                            <input type="text" id="search" name="search" value="" placeholder="Поиск товаров" class="tablet-search-form__field">
                            <input class="tablet-search-form__button" type="submit" value="Найти">
                        </p>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_SESSION['accountName'])) {
            ?>
                <div class="login-block">
                    <a href="functions/account/logout.php">
                        <span>Выход</span>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>
</header>