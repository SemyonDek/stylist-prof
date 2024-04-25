<?php
require_once('connect.php');


$productsAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$productsAll = mysqli_fetch_all($productsAll, MYSQLI_ASSOC);
$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);
$productsPopular = mysqli_query($ConnectDatabase, "SELECT * FROM `products_popular`");
$productsPopular = mysqli_fetch_all($productsPopular, MYSQLI_ASSOC);


function addProdRewUser($productsAll, $photos, $productsPopular)
{

    foreach ($productsPopular as $itemPopular) {
        foreach ($productsAll as $item) {

            if ($itemPopular['PRODID'] == $item['ID']) {
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
    }
}
function addProdRewAdm($productsAll, $photos, $productsPopular)
{

    foreach ($productsPopular as $itemPopular) {
        foreach ($productsAll as $item) {

            if ($itemPopular['PRODID'] == $item['ID']) {
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
    }
}
