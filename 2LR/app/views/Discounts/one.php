<ul class="list-group">
    <li class="list-group-item">
        <div>Скидка: <?=$objectDiscount['discountPercent']?></div>
        <div><a class="btn btn-primary" href="/discounts/edit?id=<?=$discount['discountId']?>">Изменить</a> <a class="btn btn-danger" href="/discounts/drop?id=<?=$discount['discountId']?>">Удалить</a></div>
        </li>
</ul>