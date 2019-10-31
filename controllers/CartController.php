<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionCart($name)
    {
        $good = new Good();
        $good = $good->getOneGood($name);
        return $this->render('cart', compact('good'));
    }
}