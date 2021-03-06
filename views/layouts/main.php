<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="body">
  <header>
    <div class="container">
      <div class="header">
        <a href="/">На главную</a>
        <?php if (Yii::$app->user->isGuest) { ?>
          <a href="/admin/login">Login</a>
        <?php } else { ?>
          <a href="/admin/logout">Logout</a>
        <?php } ?>
        <a href="#" class="cart">Корзина (<span class="menu-quantity"><?php echo $_SESSION['cart.totalQuantity'] ? $_SESSION['cart.totalQuantity'] : 0; ?></span>)</a>
        <form action="<?php echo Url::to(['category/search']); ?>" method="get">
          <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
        </form>

      </div>
    </div>
  </header>
  <div class="container">
    <?= $content ?>
  </div>
  <footer>
    <div class="container">
      <div class="footer">
        &copy; Все права защищены или типа того
      </div>
    </div>
  </footer>
</section>
<div id="cart" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Корзина</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="clearCart">Очистить корзину</button>
        <button type="button" class="btn btn-primary btn-close"  data-dismiss="modal">Продолжить покупки</button>
        <button type="button" class="btn btn-success btn-next">Оформить заказ</button>
      </div>
    </div>
  </div>
</div>
<div id="order" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Оформление заказа</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>

    </div>
  </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
