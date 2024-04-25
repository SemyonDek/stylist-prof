<?php
require_once('config/product.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <link rel="stylesheet" href="css/catalog.css">
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
            </div>
            <div class="title-catalog">
                <h1 class="title-catalog_h1">Поиск: <?= $_GET['search'] ?></h1>
            </div>

            <div class="catalog-main-block">
                <div class="filter-block">
                    <form action="" id="filter-form">
                        <h3>Бренд</h3>

                        <div class="brand-block">
                            <?php
                            if (isset($_GET['brand'])) {
                                addFilterBrand($brand, $_GET['brand']);
                            } else {
                                addFilterBrand($brand);
                            }
                            ?>
                            <br>
                        </div>

                        <input name="search" type="hidden" value="<?= $_GET['search'] ?>">
                        <input class="add-basket-btn" type="submit" value="Применить">
                    </form>
                    <form action="">
                        <input name="search" type="hidden" value="<?= $_GET['search'] ?>">
                        <input class="add-basket-btn" type="submit" value="Сбросить">
                    </form>

                </div>

                <div class="catalog-product-block">

                    <div class="grid-catalog-block">

                        <?php
                        addProdListUser($products, $photos);
                        ?>
                    </div>


                </div>
            </div>

        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/basket.js"></script>

</html>