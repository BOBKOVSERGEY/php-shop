<div class="container">
    <nav class="nav nav-menu">
        <a class="nav-link active" href="/">Всё меню</a>

        <?php foreach ($data as $item) { ?>
            <a class="nav-link" href="#"><?php echo $item['browser_name']; ?></a>
        <?php } ?>


    </nav>
</div>