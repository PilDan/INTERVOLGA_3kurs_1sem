<ul class="list-group">
    <? foreach ($saleProduct as $sale) { ?>
        <li class="list-group-item">
            <div>Проданное лекарство: <?=$sale['product']['title']?></div>
            <div>Время покупки: <?=$sale['buyer']['visit_time']?></div>
            <div><a class="btn btn-primary" href="/sales/edit?id=<?=$sale['saleId']?>">Изменить</a> <a class="btn btn-danger" href="/sales/drop?id=<?=$sale['saleId']?>">Удалить</a></div>
        </li>
    <? } ?>
</ul>