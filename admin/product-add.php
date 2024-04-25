<?php
require_once('../config/category.php');
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
            <h2>Добавить товар</h2>
            <div class="add-conteiner">
                <form id="add-prod-form" action="">
                    <div class="line-add-prod">
                        <div class="name-add-prod">Категория:</div>
                        <select class="input-add-prod" name="catidprod" id="catidprod">
                            <option value=""></option>
                            <?php
                            addSelectProd($category, 0, 1);
                            ?>
                        </select>
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Название:</div>
                        <input class="input-add-prod" id="nameprod" name="nameprod" type="text">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Артикул:</div>
                        <input class="input-add-prod" id="codeprod" name="codeprod" type="text">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Цена:</div>
                        <input class="input-add-prod" id="priceprod" name="priceprod" type="number">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Бренд:</div>
                        <input class="input-add-prod" id="brandprod" name="brandprod" type="text">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Производитель:</div>
                        <input class="input-add-prod" id="countryprod" name="countryprod" type="text">
                    </div>
                    <div class="line-add-prod">
                        <div class="name-add-prod">Описание:</div>
                        <textarea class="textarea-add-prod" name="descprod" id="descprod"></textarea>
                    </div>
                    <div class="line-add-prod">
                        <input class="button-add-prod" id="addProdButton" type="button" value="Добавить" style="margin-right: 20px;">
                        <a class="button-add-prod" href="catalog.php?catid=0">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

<script src="../script/product-add.js"></script>

</html>