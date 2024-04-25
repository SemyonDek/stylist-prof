<?php

require_once('connect.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);

$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);

function addBasket($basket, $products, $photos)
{
    foreach ($basket as $key => $item) {
        foreach ($products as $itemProd) {
            if ($itemProd['ID'] == $item['ID']) {
                $src = '';
                foreach ($photos as $itemPhoto) {
                    if ($itemProd['ID'] == $itemPhoto['PRODID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
?>
                <tr>
                    <td class="product">
                        <div class="img-product-basket">
                            <img src="<?= $src ?>" alt="">
                        </div>
                        <div class="name-product-basket">
                            <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                        </div>
                    </td>
                    <td class="price">
                        <span>Розничная цена</span>
                        <div class="price-product-basket-block"><?= $itemProd['PRICE'] ?> <span class="price-rouble"></span>
                        </div>
                    </td>
                    <td class="value">
                        <div class="value-prod-block">
                            <?= $item['VALUE'] ?>
                        </div>
                    </td>
                    <td class="amount"><?= $item['AMOUNT'] ?> <span class="price-rouble"></span>
                    </td>
                    <td class="del">
                        <span class="del-product-basket" onclick="delBasket(<?= $key ?>)"></span>
                    </td>
                </tr>
<?php
            }
        }
    }
}
