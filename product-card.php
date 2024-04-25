<?php
require_once('config/category.php');
require_once('config/product-photo.php');

require_once('config/product-popular.php');

$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$catid = $productitem['CATID'];

$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);

$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);

$photoPage = count($productPhoto);
if ($photoPage < 3) {
    $photoPage = 1;
} else {
    $photoPage = $photoPage - 1;
}

require_once('config/review.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карточка товара</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product-card.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="breadcrumbs">
                <a href="index.php" class="breadcrumb-item">Главная страница</a>
                <span class="breadcrumbs-arrow">></span>
                <?php
                if ($categoryitem['PARENT'] == 0) {
                ?>
                    <div class="breadcrumb-not-active"><?= $categoryitem['NAME'] ?></div>
                <?php
                } else {
                    $catidparent = $categoryitem['PARENT'];
                    $categoryParent = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catidparent'");
                    $categoryParent = mysqli_fetch_assoc($categoryParent);
                ?>
                    <a href="catalog.php?catid=<?= $categoryParent['ID'] ?>" class="breadcrumb-item"><?= $categoryParent['NAME'] ?></a>
                    <span class="breadcrumbs-arrow">></span>
                    <a href="catalog.php?catid=<?= $categoryitem['ID'] ?>" class="breadcrumb-item"><?= $categoryitem['NAME'] ?></a>
                    <span class="breadcrumbs-arrow">></span>
                    <div class="breadcrumb-not-active"><?= $productitem['NAME'] ?></div>
                <?php
                }
                ?>
            </div>

            <div class="product-card-block">
                <div class="photo-product-block">
                    <div class="main-photo-product-block">
                        <img id="main-photo" src="<?= $productPhoto[0]['SRC'] ?>" alt="">
                    </div>
                    <div class="slider-product-photos">
                        <input id="countpagesphotoslider" type="hidden" value="<?= $photoPage ?>">
                        <div class="hidden-slider-block">
                            <div id="slider-photo" class="swipe-slider-photo">
                                <?php
                                foreach ($productPhoto as $item) {
                                ?>
                                    <div class="item-photo-slider-prod">
                                        <img class="item-img" src="<?= $item['SRC'] ?>" alt="">
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="button-slider left-button-slider" id="btn-slid-left"></div>
                        <div class="button-slider right-button-slider" id="btn-slid-right"></div>

                    </div>
                </div>

                <div class="buy-product-block">
                    <h1 class="name-product-title">
                        <?= $productitem['NAME'] ?>
                    </h1>
                    <div class="line-info-buy-block">
                        <div class="line-info-buy-item">
                            <span class="name-line-info">Артикул:</span>
                            <span class="value-line-info"><?= $productitem['CODE'] ?></span>
                        </div>
                        <div class="line-info-buy-item">
                            <span class="name-line-info">Бренд:</span>
                            <span class="value-line-info"><?= $productitem['BRAND'] ?></span>
                        </div>
                    </div>
                    <div class="buy-prod-main-block">
                        <div class="price-info-prod-block">
                            <span class="price-name">Розничная цена:</span>
                            <div class="main-price-block"><?= $productitem['PRICE'] ?> <span class="price-rouble"></span></div>
                        </div>
                        <div class="buy-button-main-block">
                            <div class="value-prod-block">
                                <span onclick="updValue(-1)" id="minus-value" class="value-upd-btn minus-value">-</span>
                                <input id="value-prod-input" type="number" value="1" readonly>
                                <span onclick="updValue(1)" id="plus-value" class="value-upd-btn plus-value">+</span>
                            </div>
                            <button onclick="addBasket(<?= $productitem['ID'] ?>)" class="add-basket-main-button">В корзину</button>
                        </div>
                    </div>
                </div>

                <div class="bottom-info-block">
                    <div class="top-tubs-block">
                        <div id="desc-tub" class="tub-active">Описание</div>
                        <div id="char-tub" class="">Характеристики</div>
                        <div id="review-tub" class="">Отзывы</div>
                    </div>
                    <div class="main-tubs-info-block">
                        <div id="description-block" class="tub-info-active"><?= nl2br($productitem['TEXT']) ?></div>
                        <div id="characteristic-block" class="">

                            <div class="line-characteristic-prod">
                                <div class="characteristics__title">
                                    <span class="characteristics__name">Артикул:</span>
                                    <span class="characteristics__points"></span>
                                </div>
                                <span class="characteristics__value"><?= $productitem['CODE'] ?></span>
                            </div>

                            <div class="line-characteristic-prod">
                                <div class="characteristics__title">
                                    <span class="characteristics__name">Бренд:</span>
                                    <span class="characteristics__points"></span>
                                </div>
                                <span class="characteristics__value"><?= $productitem['BRAND'] ?></span>
                            </div>

                            <div class="line-characteristic-prod">
                                <div class="characteristics__title">
                                    <span class="characteristics__name">Производитель:</span>
                                    <span class="characteristics__points"></span>
                                </div>
                                <span class="characteristics__value"><?= $productitem['PRODUCER'] ?></span>
                            </div>

                        </div>
                        <div id="reviews-block" class="">
                            <div class="add-reviews-block">
                                <form id="addReviewForm" action="">
                                    <div class="name-input-review">Ваше имя</div>
                                    <input id="name_user" name="name_user" type="text">
                                    <div class="name-input-review">Комментарий</div>
                                    <textarea name="review_comm" id="review_comm"></textarea>
                                    <input class="review-button" type="button" value="Отправить" onclick="addComm(<?= $productitem['ID'] ?>)">
                                </form>
                            </div>
                            <div id="rewiews-list-block" class="reviews-list-block">
                                <?php
                                addReviewsUser($reviews, $productitem['ID']);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-view-block">
                <h2>Вы смотрели</h2>
                <input id="countpagesslider" value="<?= $countview ?>" type="hidden">
                <div class="slider-block">
                    <div class="hidden-block">
                        <div id="slider" class="swipe-slider-block">
                            <?php
                            if (isset($_SESSION['viewProdList']))
                                addSliderUser($productsAll, $photos, $_SESSION['viewProdList'])
                            ?>
                        </div>
                    </div>
                    <div class="button-slider" id="left-button-slider"></div>
                    <div class="button-slider" id="right-button-slider"></div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/slider-index.js"></script>
<script src="script/basket.js"></script>

<script>
    function addComm(prodid) {
        let name = document.getElementById("name_user");
        let comm = document.getElementById("review_comm");

        prov = true;
        if (comm.value == "") {
            prov = false;
        }
        if (name.value == "") {
            prov = false;
        }

        if (!prov) {
            alert("Введите данныу");
        } else {
            let formData = new FormData();
            formData.append("name", name.value);
            formData.append("comm", comm.value);
            formData.append("prodid", prodid);

            var url = "functions/reviews/add.php";

            let xhr = new XMLHttpRequest();

            xhr.responseType = "document";

            xhr.open("POST", url);
            xhr.send(formData);
            xhr.onload = () => {
                console.log(xhr.response);
                document.getElementById("rewiews-list-block").innerHTML =
                    xhr.response.getElementById("rewiews-list-block").innerHTML;
                document.getElementById("name_user").value = "";
                document.getElementById("review_comm").value = "";
            };
        }
    }



    let countPhoto = document.getElementById("countpagesphotoslider").value;
    let sliderPhoto = document.getElementById("slider-photo");
    let left_btnPhoto = document.getElementById("btn-slid-left");
    let right_btnPhoto = document.getElementById("btn-slid-right");
    let pagesliderPhoto = 1;

    function movesliderPhoto(n) {
        sliderPhoto.style.left = "-" + (pagesliderPhoto + n - 1) * 206 + "px";
    }

    right_btnPhoto.onclick = function() {
        if (pagesliderPhoto < countPhoto) {
            movesliderPhoto(1);
            pagesliderPhoto++;
        }
    };
    left_btnPhoto.onclick = function() {
        if (pagesliderPhoto > 1) {
            movesliderPhoto(-1);
            pagesliderPhoto;
        }
    };

    let mainPhoto = document.getElementById("main-photo");
    let imgList = document.getElementsByClassName("item-img");

    var swipePhoto = function(e) {
        mainPhoto.src = e.currentTarget.src;
    };

    for (var i = 0; i < imgList.length; i++) {
        imgList[i].addEventListener("click", swipePhoto, false);
    }

    function updValue(value) {
        let input = document.getElementById('value-prod-input');

        let count = Number(input.value);

        if (value == 1) {
            input.value = count + value;
        } else {
            if (count > 1) {
                input.value = count + value;
            }
        }
    }

    let descTub = document.getElementById('desc-tub');
    let descriptionBlock = document.getElementById('description-block');
    let charTub = document.getElementById('char-tub');
    let characteristicBlock = document.getElementById('characteristic-block');
    let reviewTub = document.getElementById('review-tub');
    let reviewsBlock = document.getElementById('reviews-block');

    descTub.onclick = function() {
        document.getElementsByClassName('tub-active')[0].classList.remove('tub-active');
        descTub.classList.add('tub-active');
        document.getElementsByClassName('tub-info-active')[0].classList.remove('tub-info-active');
        descriptionBlock.classList.add('tub-info-active');
    }

    charTub.onclick = function() {
        document.getElementsByClassName('tub-active')[0].classList.remove('tub-active');
        charTub.classList.add('tub-active');
        document.getElementsByClassName('tub-info-active')[0].classList.remove('tub-info-active');
        characteristicBlock.classList.add('tub-info-active');
    }

    reviewTub.onclick = function() {
        document.getElementsByClassName('tub-active')[0].classList.remove('tub-active');
        reviewTub.classList.add('tub-active');
        document.getElementsByClassName('tub-info-active')[0].classList.remove('tub-info-active');
        reviewsBlock.classList.add('tub-info-active');
    }
</script>

</html>