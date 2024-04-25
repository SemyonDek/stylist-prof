<?php
require_once('../config/coupon.php');
require_once('../config/review.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/coupon.css">
    <link rel="stylesheet" href="../css/product-card.css">
</head>

<body>

    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <h2>Отзывы</h2>
            <div id="reviews-adm" class="reviews-list-block" style="width: 80%;">
                <?php
                addReviewsAdm($reviews, $products);
                ?>
            </div>

        </div>
    </main>

</body>

<script src="../script/review-del.js"></script>

</html>