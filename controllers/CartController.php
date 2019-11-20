<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Good;
use app\models\Order;
use app\models\OrderGood;
use yii\helpers\Url;
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

        if (!$session['cart.totalSum']) {

            return $this->redirect('/');
            //return Yii::$app->response->redirect(Url::to('/'));
        }
        // если форма загрузилась
        if ($order->load(Yii::$app->request->post())) {
            $order->date = date('Y-m-d H:i:s');
            $order->sum = $session['cart.totalSum'];
            // если все сохраняется успешно
            if ($order->save()) {
                $currentId =  $order->id . ' - от ' . date('Y-m-d');

                $this->saveOrderInfo($session['cart'], $order->id);

                Yii::$app->session->setFlash('success', 'Ваш заказ №'. $currentId . ' принят.');

                // отправляем письмо
                Yii::$app->mailer->compose('order', ['session' => $session, 'order' => $order])
                        ->setFrom(['esdipochta@gmail.com' => 'Суши Сашими '])
                        // куда отправляем? например заказчику
                        ->setTo($order->email)
                        // куда отправляем? например менеджеру
                        //->setCc('esdicompany@yandex.ru')
                        ->setBcc('esdicompany@yandex.ru')
                        ->setSubject('Заказ суши №' . $currentId)
                        ->send();
                // очищаем корзину и все инфу из сессии
                $session->remove('cart');
                $session->remove('cart.totalQuantity');
                $session->remove('cart.totalSum');

                //return $this->redirect('order');
                return $this->render('success', compact('session', 'currentId'));
            }
        }

        $this->layout = 'emptylayout';
        return $this->render('order', compact('session', 'order'));
    }

    protected function saveOrderInfo($goods, $orderId)
    {
        foreach ($goods as $id => $good) {
            $orderInfo = new OrderGood();
            // записываем номер заказа
            $orderInfo->order_id = $orderId;
            $orderInfo->product_id = $id;
            $orderInfo->name = $good['name'];
            $orderInfo->price = $good['price'];
            $orderInfo->quantity = $good['goodQuantity'];
            $orderInfo->sum = $good['goodQuantity'] * $good['price'];

            $orderInfo->save();
        }

    }
}