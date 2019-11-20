<?php
use yii\helpers\Url;
?>
<div class="container">
    <nav class="nav nav-menu">
        <a class="nav-link" href="/">Всё меню</a>

        <?php foreach ($data as $item) { ?>
            <a class="nav-link" data-id="<?php echo $item['cat_name']; ?>" href="<?php echo Url::to(['category/view', 'id' => $item['cat_name']]); ?>"><?php echo $item['browser_name']; ?></a>
        <?php } ?>


    </nav>
</div>