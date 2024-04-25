<?php
require_once('../config/category.php');

$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);

$catindexProv = mysqli_query($ConnectDatabase, "SELECT * FROM `category_index` WHERE CATID = '$catid'");
$catindexProv = mysqli_fetch_assoc($catindexProv);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/category-adm.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <h2>Изменение категории</h2>
            <!-- <form id="addCategoryForm" action=""> -->
            <div class="upd-block">
                <h2>Изображение</h2>
                <div id="mainPhotoCat" class="block-img">
                    <img src="../<?= $categoryitem['SRC'] ?>" alt="">
                </div>
                <div class="btn-img-block">
                    <form id="PhotoCatForm" action="">
                        <input type="file" name="file_photo" id="file_photo">
                        <input id="upd-photo-button" type="button" value="Изменить">
                    </form>
                </div>
                <form id="addCategoryForm" action="">
                    <input type="hidden" name="catid" id="catid" value="<?= $catid ?>">
                    <h2>Информация</h2>
                    <p class="name-info">
                        Название:
                    </p>
                    <input class="name-input" name="namecat" id="namecat" type="text" value="<?= $categoryitem['NAME'] ?>">
                    <p class="name-info">
                        На главную:
                    </p>
                    <select name="catindex" id="catindex">
                        <option value="0">Нет</option>
                        <option value="1" <?php if (isset($catindexProv)) echo 'selected="selected"' ?>>Да</option>
                    </select>
                    <div class="button-upd-block">
                        <input id="upd-category-button" class="upd-button" type="button" value="Изменить">
                        <input id="del-category-button" class="upd-button" type="button" value="Удалить">
                        <a class="upd-button" href="category-list.php">Назад</a>
                    </div>
                </form>
            </div>
            <!-- </form> -->
        </div>
    </main>

</body>

<script src="../script/category-upd.js"></script>

</html>