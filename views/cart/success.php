<?php if( Yii::$app->session->hasFlash('success') ): ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo Yii::$app->session->getFlash('success'); ?>
  </div>
<?php endif;?>
<p>Менеджер свяжется с Вами в ближайшее время.</p>
<div>
  <a href="/" class="btn btn-success">Перейти на главную</a>
</div>