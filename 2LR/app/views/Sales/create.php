<form class="row g-3" method="post">
    <div class="col-md-4">
        <label for="products" class="form-label">Проданное лекарство</label>
        <select id="products" class="form-select" name="productId">
            <? foreach ($products as $product)  {?>
                <option value="<?=$product['id']?>"><?=$product['title']?></option>
            <? } ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="buyers" class="form-label">Покупатель</label>
        <select  id="buyers" class="form-select" name="buyerId">
            <? foreach ($buyers as $buyer)  {?>
                <option type="date" value="<?=$buyer['id']?>"><?=$buyer['visit_time']?></option>
            <? } ?>
        </select>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Создать новую продажу</button>
    </div>
</form>
