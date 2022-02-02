<div>Поиск доступных скидок</div>
<form class="row mb-4" method="get" action="/discounts/one">
    <div class="row mt-2">
        <div class="col-md-2">
            <label for="discountPercent" class="form-label">Процент скидки</label>
            <input type="number" class="form-control" id="discountPercent" name="percent">
            <button type="submit" class="btn btn-primary mt-2">Найти</button>
        </div>
    </div>
</form>
<a class="btn btn-primary mb-4" href="/discounts/create">Добавить скидку</a><br/>
<a class="btn btn-primary" href="/discounts/table-output">Посмотреть все скидки</a>
