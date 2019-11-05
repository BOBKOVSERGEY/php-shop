<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Good;
use yii\web\Controller;
use Yii;

class CartController extends Controller
{
    public function actionOpen()
    {
        $session = Yii::$app->session;
        $session->open();

        return $this->renderPartial('add', compact('session'));
    }
    public function actionAdd($name)
    {
        $good = new Good();
        $good = $good->getOneGood($name);

        $session = Yii::$app->session;
        $session->open();
        //$session->remove('cart');
        $cart = new Cart();
        $cart->addToCart($good);
        // без шаблона
        return $this->renderPartial('add', compact('good', 'session'));
    }
}