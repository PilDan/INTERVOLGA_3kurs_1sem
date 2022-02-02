<ul class="list-group">
    <? foreach ($discountPharmacy as $discount) { ?>
        <li class="list-group-item">
            <div>Скидка: <?=$discount['discountPercent']?> %</div>
            <div><a class="btn btn-primary" href="/discounts/edit?id=<?=$discount['discountId']?>">Изменить</a> <a class="btn btn-danger" href="/discounts/drop?id=<?=$discount['discountId']?>">Удалить</a></div>
        </li>
    <? } ?>
</ul>