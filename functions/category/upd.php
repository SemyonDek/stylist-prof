<?php
require_once('../../config/connect.php');

$catid = $_POST['catid'];
$namecat = $_POST['namecat'];

if (isset($_POST['parentid'])) {
    $parentid = $_POST['parentid'];
} else {
    $parentid = 0;
}

if (isset($_POST['catindex'])) {
    $catindex = $_POST['catindex'];
} else {
    $catindex = 0;
}


mysqli_query($ConnectDatabase, "UPDATE `category` SET 
    `PARENT` = '$parentid', `NAME` = '$namecat' WHERE `category`.`ID` = $catid");

require_once('../../config/category.php');

$catindexProv = mysqli_query($ConnectDatabase, "SELECT * FROM `category_index` WHERE CATID = '$catid'");
$catindexProv = mysqli_fetch_assoc($catindexProv);

if ($catindex == 1) {
    if (!isset($catindexProv))
        mysqli_query($ConnectDatabase, "INSERT INTO `category_index` (`ID`, `CATID`) VALUES (NULL, '$catid')");
} else {
    mysqli_query($ConnectDatabase, "DELETE FROM `category_index` WHERE `category_index`.`CATID` = $catid");
}


if (isset($_POST['parentid'])) {
    $categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
    $categoryitem = mysqli_fetch_assoc($categoryitem);
?>

    <select name="parentid" id="parentid">
        <?php
        addSelect($category, 0, 0, $categoryitem['PARENT']);
        ?>
    </select>
<?php
}
