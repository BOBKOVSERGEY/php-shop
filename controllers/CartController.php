<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Good;
use app\models\Order;
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

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');

        return $this->renderPartial('add', compact('session'));
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcCart($id);
        return $this->renderPartial('add', compact('session'));

    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();

        // если форма загрузилась
        if ($order->load(Yii::$app->request->post())) {
            $order->date = date('Y-m-d H:i:s');
            $order->sum = $session['cart.totalSum'];
            // если все сохраняется успешно
            if ($order->save()) {
                Yii::$app->mailer->compose()
                    ->setFrom(['zakaz@ishimi.ru' => 'Ceib Ишими'])
                    ->setTo('zakaz@ishimi.ru')
                    ->setSubject('New Order')
                    ->send();
                // очищаем корзину и все инфу из сессии
                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalSum');

                return $this->render('success', compact('session'));
            }
        }

        $this->layout = 'emptylayout';
        return $this->render('order', compact('session', 'order'));
    }
}