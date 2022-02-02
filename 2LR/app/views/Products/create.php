<form class="row g-3" method="post">

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
        <!-- Выводим список наших скидок на выбор -->
        <select id="discounts" class="form-select" name="what_discount">
            <? foreach ($discounts as $discount)  {?>
                <option value="<?=$discount['id']?>"><?=$discount['percent']?></option>
            <? } ?>
        </select>
    </div>

    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Добавить лекарство</button>
    </div>
</form>
