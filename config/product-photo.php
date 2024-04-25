<?php
require_once('connect.php');

$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);
function addProdPhotoAdmin($photo)
{
    foreach ($photo as $item) {
?>
        <div class="item-photo">
            <img src="../<?= $item['SRC'] ?>" alt="">
            <div class="del-photo" onclick="delPhoto(<?= $item['ID'] ?>)">
                <img src="../img/main/cross-circle-svgrepo-com.png" alt="">
            </div>
        </div>
<?php
    }
}
