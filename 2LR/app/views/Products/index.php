
<div>Поиск лекарств по названию</div>
<form class="row mb-4" method="get" action="/products/one">
    <div class="row mt-2">
        <div class="col-md-2">
            <label for="titleProduct" class="form-label">Название лекарства</label>
            <input type="text" class="form-control" id="titleProduct" name="title">
            <button type="submit" class="btn btn-primary mt-2">Найти</button>
        </div>
    </div>
</form>
<a class="btn btn-primary mb-4" href="/products/create">Добавить лекарство</a><br/>
<a class="btn btn-primary" href="/products/table-output">Посмотреть все лекарства</a>