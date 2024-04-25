<?php
require_once('config/category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cписок категорий</title>
    <link rel="stylesheet" href="css/index.css">
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
                <div class="breadcrumb-not-active">Список категорий</div>
            </div>

            <div class="category-block">
                <?php
                addCategoryListUser($category);
                ?>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

</html>