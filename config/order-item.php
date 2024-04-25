<?php

function addOrderItemList($orderItems)
{
    foreach ($orderItems as $item) {
?>
        <tr>
            <td class="name-prod"><?= $item['NAME'] ?></td>
            <td class="price-prod"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?> ₽</td>
            <td class="value-prod"><?= $item['VALUE'] ?> шт.</td>
            <td class="amount-prod"><?= number_format($item['AMOUNT'], 0, '.', ' ') . ' ' ?> ₽</td>
        </tr>
<?php
    }
}
