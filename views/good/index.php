<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-8 justify-self-center">
            <h2><div class="product-title"><?php echo $good['name']; ?></div></h2>
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?php echo $good['img']; ?>" alt="<?php echo $good['name']; ?>">
                </div>
                <div class="product-name"><?php echo $good['name']; ?></div>
                <div class="product-descr">Состав: <?php echo $good['composition']; ?></div>
                <div class="product-descr">Описание: <?php echo $good['descr']; ?></div>
                <div class="product-price">Цена: <?php echo $good['price']; ?> рублей</div>
                <div class="product-buttons">
                    <button type="button" class="product-button__add btn btn-success">Заказать</button>
                </div>
            </div>
        </div>
    </div>
</div>