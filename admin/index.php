<?php
require_once('../config/category.php');
require_once('../config/product-popular.php');
require_once('../config/product-review.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="category-block">

                <?php
                addCategoryListUserAdm($category, $categoryIndex);
                ?>


            </div>

            <div class="slider-main-block">
                <h2>Выгодные предложения</h2>
                <input id="countpagesslider" value="<?= $countPopular ?>" type="hidden">
                <div class="slider-block">
                    <div class="hidden-block">
                        <div id="slider" class="swipe-slider-block">

                            <?php
                            addSliderAdm($productsAll, $photos, $productsPopular)
                            ?>


                        </div>
                    </div>
                    <div class="button-slider" id="left-button-slider"></div>
                    <div class="button-slider" id="right-button-slider"></div>
                </div>

            </div>

            <div class="popular-block">
                <h2>Популярное по отзывам</h2>
                <div class="popular-products-block">

                    <?php
                    addProdRewAdm($productsAll, $photos, $productsPopular)
                    ?>

                </div>
            </div>
        </div>
    </main>

</body>

<script src="../script/slider-index.js"></script>

</html>