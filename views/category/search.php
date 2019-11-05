<?php echo \app\widgets\MenuWidget::widget();?>
<div class="container">
    <h1 class="text-center m-3">Результаты поиска по запросу "<?php echo $query; ?>"</h1>
    <div class="row justify-content-center">
        <?php if(!$goods) { ?>
                <h2>По вашему запросу ничего не найдено</h2>
        <?php } else { ?>
            <?php foreach ($goods as $good) { ?>
                <div class="col-4">
                    <div class="product">
                        <div class="product-img">
                            <img src="/img/<?php echo $good['img']; ?>" alt="<?php echo $good['name']; ?>">
                        </div>
                        <div class="product-name"><?php echo $good['name']; ?></div>
                        <div class="product-descr">Состав: <?php echo $good['composition']; ?></div>
                        <div class="product-price">Цена: <?php echo $good['price']; ?> рублей</div>
                        <div class="product-buttons">
                            <button type="button" data-name="<?php echo $good['link_name']; ?>" class="product-button__add btn btn-success">Заказать</button>
                          <a href="<?php echo \yii\helpers\Url::to(['good/index', 'name' => $good['link_name']]); ?>" class="product-button__more btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>
</div>