<?php
require_once('../config/category.php');
require_once('../config/product-photo.php');
$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE PRODID = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
$popularList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_popular` WHERE PRODID = '$prodid'");
$popularList = mysqli_fetch_assoc($popularList);
$profitableList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_profitable` WHERE PRODID = '$prodid'");
$profitableList = mysqli_fetch_assoc($profitableList);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/product-add.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <h2>Изменить товар</h2>
            <div class="add-conteiner">
                <form id="add-prod-form" action="">
                    <input type="hidden" name="prodid" id="prodid" value="<?= $prodid ?>">
                    <div class="line-add-prod">
                        <div class="name-add-prod">Категория:</div>
                        <select class="input-add-prod" name="catidprod" id="catidprod">
                            <option value=""></option>
                            <?php
                            addSelectProd($category, 0, 1, $productitem['CATID']);
                            ?>
                        </select>
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Название:</div>
                        <input class="input-add-prod" id="nameprod" name="nameprod" type="text" value="<?= $productitem['NAME'] ?>">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Артикул:</div>
                        <input class="input-add-prod" id="codeprod" name="codeprod" type="text" value="<?= $productitem['CODE'] ?>">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Цена:</div>
                        <input class="input-add-prod" id="priceprod" name="priceprod" type="number" value="<?= $productitem['PRICE'] ?>">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Бренд:</div>
                        <input class="input-add-prod" id="brandprod" name="brandprod" type="text" value="<?= $productitem['BRAND'] ?>">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Страна:</div>
                        <input class="input-add-prod" id="countryprod" name="countryprod" type="text" value="<?= $productitem['PRODUCER'] ?>">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Выгодное предложение:</div>
                        <select class="input-add-prod" name="profitablelistprod" id="profitablelistprod">
                            <option value="0">Нет</option>
                            <option value="1" <?php
                                                if (isset($profitableList)) echo 'selected="selected"'
                                                ?>>Да</option>
                        </select>
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Популярное:</div>
                        <select class="input-add-prod" name="popularlistprod" id="popularlistprod">
                            <option value="0">Нет</option>
                            <option value="1" <?php
                                                if (isset($popularList)) echo 'selected="selected"'
                                                ?>>Да</option>
                        </select>
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Описание:</div>
                        <textarea class="textarea-add-prod" name="descprod" id="descprod"><?= $productitem['TEXT'] ?></textarea>
                    </div>
                    <div class="line-add-prod">
                        <input id="button-product-upd" class="button-add-prod" type="button" value="Изменить" style="margin-right: 20px;">
                        <a class="button-add-prod" href="catalog.php?catid=0">Назад</a>
                    </div>
                </form>

                <form id="add-photo-form" action="">
                    <h2>Добавить изображения</h2>
                    <div class="line-add-prod">
                        <input class="file-add-photo" type="file" name="file_photo" id="file_photo">
                        <input id="button-photo-add" class="button-add-photo" type="button" value="Добавить">
                    </div>
                    <div id="PhotoBlock" class="photo-prod-block">
                        <?php
                        addProdPhotoAdmin($productPhoto);
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

<script src="../script/product-upd.js"></script>

</html>