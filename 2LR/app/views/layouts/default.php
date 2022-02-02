<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <title>Аптека</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Даниил П.</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">ПМИ-191</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/discounts/index">Скидки</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/products/index">Лекарства</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/sales/index">Продажи</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Покупатели</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Фармацевты</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!--  в переменной содержится текущий вид -->
    <div class="container">
        <?= $content ?>
    </div>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
