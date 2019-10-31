<?php

namespace app\controllers;



use app\models\Good;
use yii\web\Controller;
use Yii;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $goods = new Good();
        $goods = $goods->getAllGoods();



        return $this->render('index', compact('goods'));
    }

    public function actionView($id)
    {
        $goods = new Good();
        $goods = $goods->getGoodsByCategory($id);

        return $this->render('view', compact('goods'));
    }

    public function actionSearch()
    {
        $query = Yii::$app->request->get('search');
        $goods = new Good();
        $goods = $goods->getSearchResult($query);

        return $this->render('search', compact('goods', 'query'));
    }


}