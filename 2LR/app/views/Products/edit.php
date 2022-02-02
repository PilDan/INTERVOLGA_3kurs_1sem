<form class="row g-3" method="post" action="/products/edit?id=<?=$findProduct['id']?>">
    <!-- в форму передаем айди объекта изменения -->
    <div class="col-md-6">
        <label for="picture" class="form-label">URL Фотографии</label>
        <input class="form-control" id="picture" name="picture" value="<?=$findProduct['picture']?>">
    </div>
    <div class="col-md-6">
        <label for="title" class="form-label">Название лекарства</label>
        <input class="form-control" id="title" name="title" value="<?=$findProduct['title']?>">
    </div>
    <div class="col-md-6">
        <label for="description" class="form-label">Описание</label>
        <input  class="form-control" id="description" name="description" value="<?=$findProduct['description']?>">
    </div>
    <div class="col-md-6">
        <label for="price" class="form-label">Цена</label>
        <input type="number" class="form-control" id="price" name="price" value="<?=$findProduct['price']?>">
    </div>
    <div class="col-md-4">
        <label for="discounts" class="form-label">Скидочка</label>
        <select id="discounts" class="form-select" name="what_discount" type="number">
            <!-- Первая скидка, которая должна быть изменена будет прямо в столбце, а остальные внизу на выбор-->
            <? foreach ($discounts as $discount)  {?>
                <? if ($discount['id'] === $findProduct['what_discount']) {?>
                    <option selected value="<?=$discount['id']?>"><?=$discount['percent']?></option>
                <? } else { ?>
                    <option value="<?=$discount['id']?>"><?=$discount['percent']?></option>
                <? } }?>
        </select>
    </div>

    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
</form>