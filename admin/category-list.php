<?php
require_once('../config/category.php');
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
            <h2>Список категории</h2>
            <div class="btn-category-adm">
                <a href="main-category-add.php" class="btn-category-add">Добавить категорию</a>
                <a href="child-category-add.php" class="btn-category-add">Добавить подкатегорию</a>
            </div>
            <div class="category-list-adm">
                <?php
                addCategoryListAdm($category);
                ?>
            </div>
        </div>
    </main>

</body>

</html>