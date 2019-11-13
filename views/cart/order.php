<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<?php echo $form->field($order, 'name'); ?>
<?php echo $form->field($order, 'email'); ?>
<?php echo $form->field($order, 'phone'); ?>
<?php echo $form->field($order, 'address')->textarea(['rows' => '3']); ?>
<div class="modal-footer">
    <button class="btn btn-success">Оформить заказ</button>
</div>


<?php ActiveForm::end(); ?>

