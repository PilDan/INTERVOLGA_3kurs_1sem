<form class="row g-3" method="post" action="/sales/edit?id=<?=$saleId?>" >
    <div class="col-md-4">
        <label for="products" class="form-label">Проданное лекарство</label>
        <select id="products" class="form-select" name="productId">
            <? foreach ($products as $product)  {?>
                <?php
                # если id лекарства в списке равен id лекарства - делаем этот пункт выбранным
                if ($product['id'] === $productId) {?>
                    <option selected value="<?=$product['id']?>"><?=$product['title']?></option>
                <?php } else { ?>
                    <option value="<?=$product['id']?>"><?=$product['title']?></option>
                <?php } ?>
            <? } ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="buyers" class="form-label">Время покупки</label>
        <select  id="buyers" class="form-select" name="buyerId">
            <? foreach ($buyers as $buyer)  {?>
                <?php
                if ($buyer['id'] === $buyerId) {?>
                    <option  selected value="<?=$buyer['id']?>"><?=$buyer['visit_time']?></option>
                <?php } else { ?>
                    <option  value="<?=$buyer['id']?>"><?=$buyer['visit_time']?></option>
                <?php } ?>
            <? } ?>
        </select>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
</form>
