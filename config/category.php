<?php
require_once('connect.php');

$category = mysqli_query($ConnectDatabase, "SELECT * FROM `category`");
$category = mysqli_fetch_all($category, MYSQLI_ASSOC);
$categoryIndex = mysqli_query($ConnectDatabase, "SELECT * FROM `category_index`");
$categoryIndex = mysqli_fetch_all($categoryIndex, MYSQLI_ASSOC);

$categoryList = [];
foreach ($category as $item) {
    $categoryList[$item['ID']] = $item['NAME'];
}

function searchChild($TableCat, $id)
{
    $child = [];
    array_push($child, $id);
    foreach ($TableCat as $item) {
        if ($item['PARENT'] == $id) {
            $childRed = searchChild($TableCat, $item['ID']);
            foreach ($childRed as $itemRed) {
                array_push($child, $itemRed);
            }
        }
    }
    return $child;
}

function addSelect($category, $parrent = 0, $level = 0, $selected = 0)
{
    if ($level == 0) {
?>
        <option value=""></option>
        <?php
    }
    $level++;


    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
        ?>
            <option value="<?= $item['ID'] ?>" <?php if ($selected == $item['ID']) echo 'selected="selected"'; ?>><?= str_repeat(' ', ($level - 1)) . $item['NAME'] ?></option>
        <?php
        }
    }
}
function addSelectProd($category, $parrent = 0, $level = 0, $selected = 0)
{
    if ($level == 0) {
        ?>
        <option value=""></option>
        <?php
    }
    $level++;


    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
        ?>
            <option value="<?= $item['ID'] ?>" <?php if ($selected == $item['ID']) echo 'selected="selected"'; ?>><?= str_repeat(' ', ($level - 1)) . $item['NAME'] ?></option>
        <?php
            addSelect($category, $item['ID'], $level, $selected);
        }
    }
}

function addCategoryListAdm($category)
{
    foreach ($category as $itemCat) {
        if ($itemCat['PARENT'] == 0) {
        ?>
            <h3 class="main-category-title"><?= $itemCat['NAME'] ?> <a href="upd-main-category.php?catid=<?= $itemCat['ID'] ?>">Изменить</a></span></h3>
            <?php
            foreach ($category as $itemChildCat) {
                if ($itemChildCat['PARENT'] == $itemCat['ID']) {
            ?>
                    <div class="child-category-title"><?= $itemChildCat['NAME'] ?> <a href="upd-child-category.php?catid=<?= $itemChildCat['ID'] ?>">Изменить</a></div>
    <?php
                }
            }
        }
    }
    ?>
    <?php
}


function addCategoryListUser($category)
{
    foreach ($category as $itemCat) {
        if ($itemCat['PARENT'] == 0) {
    ?>
            <div class="category-line">
                <div class="main-category-block">
                    <div class="main-category-name-block">
                        <h3 class="title-main-category"><?= $itemCat['NAME'] ?></h3>
                        <span class="category-arrow"></span>
                    </div>
                    <a href="catalog.php?catid=<?= $itemCat['ID'] ?>">Перейти в полный каталог</a>
                    <img src="<?= $itemCat['SRC'] ?>" alt="">
                </div>

                <div class="category-items-block">
                    <?php
                    foreach ($category as $itemChildCat) {
                        if ($itemChildCat['PARENT'] == $itemCat['ID']) {
                    ?>

                            <div class="category-item">
                                <a href="catalog.php?catid=<?= $itemChildCat['ID'] ?>"><?= $itemChildCat['NAME'] ?></a>
                                <img src="<?= $itemChildCat['SRC'] ?>" alt="">
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}

function addCategoryListUserIndex($category, $categoryIndex)
{

    foreach ($categoryIndex as $itemIndex) {
        foreach ($category as $itemCat) {

            if ($itemIndex["CATID"] == $itemCat['ID']) {
                if ($itemCat['PARENT'] == 0) {
            ?>
                    <div class="category-line">
                        <div class="main-category-block">
                            <div class="main-category-name-block">
                                <h3 class="title-main-category"><?= $itemCat['NAME'] ?></h3>
                                <span class="category-arrow"></span>
                            </div>
                            <a href="catalog.php?catid=<?= $itemCat['ID'] ?>">Перейти в полный каталог</a>
                            <img src="<?= $itemCat['SRC'] ?>" alt="">
                        </div>

                        <div class="category-items-block">
                            <?php
                            foreach ($category as $itemChildCat) {
                                if ($itemChildCat['PARENT'] == $itemCat['ID']) {
                            ?>

                                    <div class="category-item">
                                        <a href="catalog.php?catid=<?= $itemChildCat['ID'] ?>"><?= $itemChildCat['NAME'] ?></a>
                                        <img src="<?= $itemChildCat['SRC'] ?>" alt="">
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
            }
        }
    }
}


function addCategoryListUserAdm($category, $categoryIndex)
{

    foreach ($categoryIndex as $itemIndex) {
        foreach ($category as $itemCat) {

            if ($itemIndex["CATID"] == $itemCat['ID']) {
                if ($itemCat['PARENT'] == 0) {
                ?>
                    <div class="category-line">
                        <div class="main-category-block">
                            <div class="main-category-name-block">
                                <h3 class="title-main-category"><?= $itemCat['NAME'] ?></h3>
                                <span class="category-arrow"></span>
                            </div>
                            <a href="upd-main-category.php?catid=<?= $itemCat['ID'] ?>">Перейти в полный каталог</a>
                            <img src="../<?= $itemCat['SRC'] ?>" alt="">
                        </div>

                        <div class="category-items-block">
                            <?php
                            foreach ($category as $itemChildCat) {
                                if ($itemChildCat['PARENT'] == $itemCat['ID']) {
                            ?>

                                    <div class="category-item">
                                        <a href="upd-child-category.php?catid=<?= $itemChildCat['ID'] ?>"><?= $itemChildCat['NAME'] ?></a>
                                        <img src="../<?= $itemChildCat['SRC'] ?>" alt="">
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
            <?php
                }
            }
        }
    }
}


function addcatchildlist($category, $catid)
{
    foreach ($category as $item) {
        if ($item['PARENT'] == $catid) {
            ?>
            <div class="category-item">
                <a href="catalog.php?catid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                <img src="<?= $item['SRC'] ?>" alt="">
            </div>
<?php
        }
    }
}
