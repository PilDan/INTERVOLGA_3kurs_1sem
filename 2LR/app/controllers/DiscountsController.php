<?php

namespace app\controllers;

use app\models\Discount;

class DiscountsController extends AppController
{
    public function indexAction()
    {

    }

    public function tableOutputAction()
    {
        # получение моделей данных
        $discount = new Discount();

        $discounts = $discount->findAll();

        $discountPharmacy = array();

        foreach ($discounts as $discount) {
            $objectDiscount = [
                'discountId' => $discount['id'],
                'discountPercent' => $discount['percent'],
            ];

            $discountPharmacy[] = $objectDiscount;
        }

        $this->set(compact('discountPharmacy'));
    }

    public function createAction()
    {
        $discount = new Discount();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $discounts = $discount->findAll();
            $this->set(compact('discounts'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $percentOfProduct = $_POST['percentOfProduct'];

            $discount->add(['percent' => $percentOfProduct]);
            header('Location: /discounts/index');
        }

    }
    public function editAction()
    {
        $discounts = new Discount();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $discountId = $_GET['id'];
            $discount = $discounts->findOne($discountId);
            $discountPercent = $discount['percent'];

            $this->set(compact('discountId', 'discountPercent'));
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $discountId = $_GET['id'];
            $discountPercent = $_POST['percent'];
            $discounts = new Discount();
            $discounts->updateBy('id', $discountId, [
                'percent' => $discountPercent,
            ]);

            header('Location: /discounts/index');
        }
    }

    public function oneAction()
    {
        $discountPercent = $_GET['percent'];

        $discounts = new Discount();
        $foundDiscount = $discounts->findOne($discountPercent, 'percent');
        $objectDiscount = [
            'discountId' => $foundDiscount['id'],
            'discountPercent' => $foundDiscount['percent'],
        ];


        $this->set(compact('objectDiscount'));
    }

    public function dropAction()
    {
        $discount = new Discount();

        $discountId = $_GET['id'];

        $discount->deleteBy('id', $discountId);

        header('Location: /discounts/index');
    }
}