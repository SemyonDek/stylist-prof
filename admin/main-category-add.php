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
            <h2>Добавить категорию</h2>
            <form id="addCategoryForm" action="">
                <div class="upd-block">
                    <h2>Изображение</h2>
                    <div class="btn-img-block">
                        <input type="file" name="file_photo" id="file_photo">
                    </div>
                    <h2>Информация</h2>
                    <p class="name-info">
                        Название:
                    </p>
                    <input class="name-input" type="text" name="namecat" id="namecat">
                    <div class="button-upd-block">
                        <input id="add-category-button" class="upd-button" type="button" value="Добавить">
                        <a class="upd-button" href="category-list.php">Назад</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

<script src="../script/category-add.js"></script>

</html>