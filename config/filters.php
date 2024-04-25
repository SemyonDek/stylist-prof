<?php

if ((isset($_GET['search']) && $_GET['search'] !== '') || (isset($_POST['search']))) {
    if (isset($_GET['search'])) {
        $search = '%' . $_GET['search'] . '%';
    } else {
        $search = '%' . $_POST['search'] . '%';
    }
    $searchStr = "(
        `NAME` LIKE '$search')";
} else $searchStr = '';



if (isset($_GET['catid']) && $_GET['catid'] !== '' && !preg_match('/\s/', $_GET['catid'])) {
    $prodChild = searchChild($category, $_GET['catid']);
    $idChildProd = '`CATID` in (';
    foreach ($prodChild as $item) {
        $idChildProd .= $item . ', ';
    }
    $idChildProd = substr($idChildProd, 0, -2) . ')';
} else $idChildProd = '';


$str_brand = "AND (";
$i = 0;
foreach ($brand as $key => $item_brand) {
    if (isset($_GET['brand'][$key])) {
        if ($i > 0) {
            $str_brand .= " OR BRAND = '" . $item_brand . "'";
            $i++;
        } else {
            $str_brand .= "BRAND = '" . $item_brand . "'";
            $i++;
        }
    }
}
$str_brand .= ")";

if ($i == 0) {
    $str_brand = "";
}
