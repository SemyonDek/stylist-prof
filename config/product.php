<?php

require_once('connect.php');
require_once('category.php');
require_once('product-photo.php');
require_once('brand.php');
require_once('filters.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE $searchStr $idChildProd $str_brand");

$products = mysqli_fetch_all($products, MYSQLI_ASSOC);


function addProdListAdmin($products, $photos)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['PRODID'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
?>
        <div class="item-prod">
            <div class="img-prod-block">
                <a href="product-upd.php?prodid=<?= $item['ID'] ?>">
                    <img src="../<?= $src ?>" alt="">
                </a>
            </div>
            <div class="name-prod">
                <a href="product-upd.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
            </div>
            <div class="price-prod"><?= $item['PRICE'] ?> <span class="price-rouble"></span></div>
            <div class="buy-button-block">
                <input class="add-basket-btn" type="button" value="Удалить" onclick='delProd(<?= $item["ID"] ?>)'>
            </div>
        </div>
    <?php
    }
}

function addProdListUser($products, $photos)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['PRODID'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
    ?>
        <div class="item-prod">
            <div class="img-prod-block">
                <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                    <img src="<?= $src ?>" alt="">
                </a>
            </div>
            <div class="name-prod">
                <a href="product-card.php?prodid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
            </div>
            <div class="price-prod"><?= $item['PRICE'] ?> <span class="price-rouble"></span></div>
            <div class="buy-button-block">
                <input class="add-basket-btn" type="button" value="В корзину" onclick='buyProd(<?= $item["ID"] ?>)'>
            </div>
        </div>
    <?php
    }
}





function addProdListAdminasd($products, $photos)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['IDPROD'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
    ?>
        <div class="product-item">
            <div class="product-inner">
                <div class="image-prod">
                    <img itemprop="image" src="../<?= $src ?>">
                </div>
                <h5>
                    <a href="upd-prod.php?prodid=<?= $item["ID"] ?>">
                        <span itemprop="name"><?= $item['NAME'] ?></span>
                    </a>
                </h5>
                <div class="stock-art"><span>Арт. <?= $item['CODE'] ?></span></div>
                <div class="price-block">
                    <?php
                    if ($item['SALE'] !== '0') {
                    ?>
                        <span class="compare-at-price nowrap"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    } else {
                    ?>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    }
                    ?>
                    <form class="prod-form" action="">
                        <input type="button" value="Удалить" onclick=' delProd(<?= $item["ID"] ?>)'>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
}
function addProdListUserasdasd($products, $photos)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['IDPROD'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
    ?>
        <div class="product-item">
            <div class="product-inner">
                <div class="image-prod">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                        <img itemprop="image" src="<?= $src ?>">
                    </a>
                </div>
                <h5>
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                        <span itemprop="name"><?= $item['NAME'] ?></span>
                    </a>
                </h5>
                <div class="stock-art"><span>Арт. <?= $item['CODE'] ?></span></div>
                <div class="price-block">
                    <?php
                    if ($item['SALE'] !== '0') {
                    ?>
                        <span class="compare-at-price nowrap"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    } else {
                    ?>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    }
                    ?>
                    <form class="prod-form" action="">
                        <input type="button" value="Купить" onclick='buyProd(<?= $item["ID"] ?>)'>
                        <i class="compare-from-list" onclick='compareProd(<?= $item["ID"] ?>)'></i>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
