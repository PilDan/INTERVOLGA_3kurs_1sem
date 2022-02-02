<?php

namespace app\controllers;

use app\models\Discount;
use app\models\Product;

class ProductsController extends AppController
{
    public function indexAction()
    {

    }
    # функция для вывода списка
    public function tableOutputAction()
    {
        # получение моделей данных
        $discount = new Discount();
        $discounts = $discount->findAll();

        $listDiscount = array();
        # ищем скидку, соответствующую нашему продукту
        foreach ($discounts as $disc)
        {
            $listDiscount[$disc['id']] = $disc;
        }

        $product = new Product();
        $products = $product->findAll();
        # создаём массив продуктов и заполняем его объектами класса Product
        $productPharmacy = array();

        foreach ($products as $pr) {
            $objectProduct = [
                'product' => $pr,
                'discount' => $listDiscount[$pr['what_discount']],
            ];

            $productPharmacy[] = $objectProduct;
        }

        $this->set(compact('productPharmacy'));
    }
    # функция создания объекта
    public function createAction()
    {
        $discount = new Discount();
        # ГЕТ запросом выводим проценты скидки для выбора пользователем, ПОСТ запросом передаем данные в БД
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $discounts = $discount->findAll();
            $this->set(compact('discounts'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $products = new Product();
            $products->add([
                'picture' => $_POST['picture'],
                'title' => $_POST['title'],
                'what_discount' => $_POST['what_discount'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
            ]);
            # после передачи преходим на главную страницу лекарств
            header('Location: /products/index');
        }

    }
    # функция изменения объекта
    public function editAction()
    {
        $discount = new Discount();
        # ГЕТ запросом получаем айди и выводим список процентов, ПОСТ запросом обновляем данные
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product = new Product();

            $discounts = $discount->findAll();
            $findProduct = $product->findOne($_GET['id']);

            $this->set(compact('findProduct', 'discounts'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $products = new Product();
            $products->updateBy('id', $_GET['id'], [
                'picture' => $_POST['picture'],
                'title' => $_POST['title'],
                'what_discount' => $_POST['what_discount'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
            ]);
            # после передачи преходим на страницу со списком лекарств
            header('Location: /products/table-output');
        }
    }
    # функция поиска одного объекта
    public function oneAction()
    {
        # ГЕТ запросом получаем название лекарства
        $titleProduct = $_GET['title'];
        $products= new Product();
        $discount = new Discount();
        # ищем наше лекарство по названию, потом ищем скидку, соответствующую этому лекарству
        $productPharmacy = $products->findOne($titleProduct, 'title');
        $objectDiscount = $discount->findOne($productPharmacy['what_discount']);
        # записываем данные нашего объекта и передаем их
        $objectProduct = [
            'productId' => $productPharmacy['id'],
            'titleProduct' => $productPharmacy['title'],
            'pictureProduct' => $productPharmacy['picture'],
            'priceProduct' => $productPharmacy['price'],
            'descriptionProduct' => $productPharmacy['description'],
            'discount' => $objectDiscount,
        ];


        $this->set(compact('objectProduct'));
    }
    # функция удаления объекта(удаляем по айди и возвращаемся на страницу списка лекарств)
    public function dropAction()
    {
        $products = new Product();

        $productId = $_GET['id'];

        $products->deleteBy('id', $productId);

        header('Location: /products/table-output');
    }
}