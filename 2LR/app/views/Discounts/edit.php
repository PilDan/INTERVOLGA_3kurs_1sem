<form class="row g-3" method="post" action="/discounts/edit?id=<?=$discountId?>" >
    <div class="col-md-6">
        <label for="discountPercent" class="form-label">Введите новую скидку</label>
        <input  type="number" class="form-control" id="discountPercent" name="percent" value="<?=$discountPercent?>">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
</form>
