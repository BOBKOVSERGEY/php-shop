<?php


namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Good extends ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods()
    {
        // получаем данные из кеша
        $goods = Yii::$app->cache->get('goods');
        // если не получили
        if (!$goods) {
            // идем в БД
            $goods = Good::find()->asArray()->all();

            // кеширум полученные данные на час
            Yii::$app->cache->set('goods', $goods, 3600);
        }

        return $goods;
    }

    public function getGoodsByCategory($id)
    {
        $catGoods = Good::find()->where(['category' => $id])->asArray()->all();
        return $catGoods;
    }
}