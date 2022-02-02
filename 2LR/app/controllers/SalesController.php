<?php

namespace app\controllers;

use app\models\Product;
use app\models\Buyer;
use app\models\Sale;

class SalesController extends AppController
{
    public function indexAction()
    {

    }

    public function tableOutputAction()
    {
        # получение моделей данных
        $sale = new Sale();
        $buyer = new Buyer();
        $product = new Product();

        $sales = $sale->findAll();

        $saleProduct = array();

        foreach ($sales as $sale) {
            $objectBuyer = $buyer->findOne($sale['id_buyer']);
            $objectProduct = $product->findOne($sale['id_product']);
            $objectSale = [
                'saleId' => $sale['id'],
                'product' => $objectProduct,
                'buyer' => $objectBuyer,
            ];

            $saleProduct[] = $objectSale;
        }

        $this->set(compact('saleProduct'));
    }

    public function createAction()
    {
        $buyer = new Buyer();
        $product = new Product();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $products = $product->findAll();
            $buyers = $buyer->findAll();

            $this->set(compact('products','buyers'));

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $buyerId = $_POST['buyerId'];
            $productId = $_POST['productId'];

            $sale = new Sale();
            $sale->add([
                'id_buyer' => $buyerId,
                'id_product' => $productId,
            ]);

            header('Location: /sales/index');
        }

    }

    public function editAction()
    {
        # получение моделей данных
        $sales = new Sale();
        $buyer = new Buyer();
        $product = new Product();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $products= $product->findAll();
            $buyers = $buyer->findAll();
            $saleId = $_GET['id'];
            $saleProduct = $sales->findOne($saleId);
            $buyerId = $saleProduct['id_buyer'];
            $productId = $saleProduct['id_product'];

            $this->set(compact('products', 'buyers', 'productId', 'buyerId','saleId'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $saleId = $_GET['id'];
            $buyerId = $_POST['buyerId'];
            $productId = $_POST['productId'];

            $sales = new Sale();
            $sales->updateBy('id', $saleId, [
                'id_buyer' => $buyerId,
                'id_product' => $productId,
            ]);

            header('Location: /sales/table-output');
        }
    }

    public function dropAction()
    {
        $sale = new Sale();

        $saleId = $_GET['id'];

        $sale->deleteBy('id', $saleId);

        # перенаправление на /classes/index
        header('Location: /sales/index');
    }
}