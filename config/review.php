<?php
require_once('connect.php');

$reviews = mysqli_query($ConnectDatabase, "SELECT * FROM `review`");
$reviews = mysqli_fetch_all($reviews, MYSQLI_ASSOC);

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);


function addReviewsUser($reviews, $prodid = 0)
{
    foreach ($reviews as $item) {
        if ($item['PRODID'] == $prodid) {
?>
            <div class="reviews-item">
                <div class="top-review-item-line">
                    <div class="name-user-review-item">
                        Пользователь:
                        <br>
                        <span><?= $item['USER'] ?></span>
                    </div>
                    <div class="data-review-item">
                        Дата публикации:
                        <br>
                        <span><?= $item['DATE'] ?></span>
                    </div>
                </div>
                <div class="bottom-review-item-line"><?= nl2br($item['COMM']) ?></div>
            </div>
        <?php
        }
    }
}

function addReviewsAdm($reviews, $products)
{
    foreach ($reviews as $item) {
        $name = '';
        foreach ($products as $itemProd) {
            if ($item['PRODID'] == $itemProd['ID']) {
                $name = $itemProd['NAME'];
                break;
            }
        }
        ?>
        <div class="reviews-item">
            <div class="name-product-reviews">
                <?= $name ?>
            </div>
            <div class="dell-review-block">
                <input class="coupon-del" type="button" value="Удалить" onclick="delComm(<?= $item['ID'] ?>)">
            </div>
            <div class="top-review-item-line">
                <div class="name-user-review-item">
                    Пользователь:
                    <br>
                    <span><?= $item['USER'] ?></span>
                </div>
                <div class="data-review-item">
                    Дата публикации:
                    <br>
                    <span><?= $item['DATE'] ?></span>
                </div>
            </div>
            <div class="bottom-review-item-line"><?= nl2br($item['COMM']) ?></div>
        </div>
<?php
    }
}
