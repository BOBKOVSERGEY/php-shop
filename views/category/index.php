<?php echo \app\widgets\MenuWidget::widget();?>
<div class="container">
    <div class="row">
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
                    <button type="button" class="product-button__add btn btn-success">Заказать</button>
                    <button type="button" class="product-button__more btn btn-primary">Подробнее</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>