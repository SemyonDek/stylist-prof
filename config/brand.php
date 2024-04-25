<?php
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$brand = [];
$prov = true;

foreach ($TableProdAll as $item) {
    foreach ($brand as $item_brand) {
        if ($item['BRAND'] == $item_brand) {
            $prov = false;
            break;
        }
    }
    if ($prov) {
        $brand[] = $item['BRAND'];
    }
    $prov = true;
}

function addFilterBrand($brand, $brandGet = [])
{
?>
    <?php
    foreach ($brand as $key => $item) {
    ?>

        <label class="lable_design" for="brand_<?= $key ?>">
            <div class="checkbox">
                <input type="checkbox" id="brand_<?= $key ?>" name="brand[<?= $key ?>]" <?php
                                                                                        if (isset($brandGet[$key])) echo "checked";
                                                                                        ?> />
                <p class="design"><?= $item ?></p>
            </div>
        </label>
<?php
    }
}
