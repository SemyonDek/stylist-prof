<?php
require_once('config/category.php');

$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
require_once('config/product.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
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
                    <div class="breadcrumb-not-active"><?= $categoryitem['NAME'] ?></div>
                <?php
                }
                ?>
            </div>

            <div class="title-catalog">
                <h1 class="title-catalog_h1"><?= $categoryitem['NAME'] ?></h1>
                <div class="category-catalog-block">

                    <?php
                    if ($categoryitem['PARENT'] == 0) {
                        addcatchildlist($category, $catid);
                    }
                    ?>

                </div>

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

                        <input name="catid" type="hidden" value="<?= $catid ?>">
                        <input class="add-basket-btn" type="submit" value="Применить">
                    </form>
                    <form action="">
                        <input name="catid" type="hidden" value="<?= $catid ?>">
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
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>
<script src="script/basket.js"></script>

</html>