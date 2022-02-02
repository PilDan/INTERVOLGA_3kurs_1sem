<ul class="list-group">
    <?php foreach ($productPharmacy  as $product) { ?>
        <li class="list-group-item">

            <div>Фото<br/><img src="<?=$product['product']['picture']?>"></div>
            <div>Название: <?=$product['product']['title']?></div>
            <div>Описание: <?=$product['product']['description']?></div>
            <div>Цена: <?=$product['product']['price']?></div>
            <div>Скидка: <?=$product['discount']['percent']?>%</div>
            <div><a class="btn btn-primary" href="/products/edit?id=<?=$product['product']['id']?>">Изменить</a> <a class="btn btn-danger" href="/products/drop?id=<?=$product['product']['id']?>">Удалить</a></div>
        </li>
    <? } ?>
</ul>