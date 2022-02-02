<ul class="list-group">
    <li class="list-group-item">

        <div>Фото<br/><img src="<?=$objectProduct['pictureProduct']?>"></div>
        <div>Название: <?=$objectProduct['titleProduct']?></div>
        <div>Описание: <?=$objectProduct['descriptionProduct']?></div>
        <div>Цена: <?=$objectProduct['priceProduct']?></div>
        <div>Скидка: <?=$objectProduct['discount']['percent']?></div>
        <div><a class="btn btn-primary" href="/products/edit?id=<?=$objectProduct['productId']?>">Изменить</a> <a class="btn btn-danger" href="/students/drop?id=<?=$objectProduct['productId']?>">Удалить</a></div>
    </li>
</ul>
