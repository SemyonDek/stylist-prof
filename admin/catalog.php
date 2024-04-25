<?php
require_once('../config/product.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="../css/catalog.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="title-catalog">
                <h1 class="title-catalog_h1">Каталог товаров</h1>
                <a class="add-product-link" href="product-add.php">Добавить</a>
                <br>
            </div>

            <div class="catalog-main-block">
                <div class="filter-block">
                    <form action="" id="filter-form">
                        <input type="hidden" name="catid" value="0">
                        <h3>Бренд</h3>

                        <?php
                        if (isset($_GET['brand'])) {
                            addFilterBrand($brand, $_GET['brand']);
                        } else {
                            addFilterBrand($brand);
                        }
                        ?>
                        <br>

                        <input class="add-basket-btn" type="submit" value="Применить">
                    </form>
                    <form action="">
                        <input type="hidden" name="catid" value="0">
                        <input class="add-basket-btn" type="submit" value="Сбросить">
                    </form>

                </div>

                <div class="catalog-product-block">

                    <div id="product-list-block" class="grid-catalog-block">

                        <?php
                        addProdListAdmin($products, $photos);
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

<script src="../script/product-del.js"></script>

</html>