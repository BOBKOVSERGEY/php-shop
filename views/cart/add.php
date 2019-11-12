<?php if ($session['cart']) { ?>
  <table class="table table-striped">

    <thead>
    <tr>
      <th scope="col">Фото</th>
      <th scope="col">Наименование</th>
      <th scope="col">Количество</th>
      <th scope="col">Цена</th>
      <th scope="col"></th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($session['cart'] as $id => $good) { ?>
      <tr>
        <td style="vertical-align: middle" width="150"><img src="/img/<?php echo $good['img']?>" alt="<?php echo $good['name']; ?>"></td>
        <td style="vertical-align: middle"><?php echo $good['name']; ?></td>
        <td style="vertical-align: middle"><?php echo $good['goodQuantity']; ?></td>
        <td style="vertical-align: middle"><?php echo $good['price'] *$good['goodQuantity']; ?> рублей</td>
        <td class="delete"  data-id="<?php echo $id; ?>" style="text-align: center; cursor: pointer; vertical-align: middle; color: red">
          <span>✖</span></td>
      </tr>
    <?php } ?>
    <tr style="border-top: 4px solid black">
      <td colspan="4">Всего товаров</td>
      <td class="total-quantity"><?php echo $session['cart.totalQuantity']; ?></td>
    </tr>
    <tr>
      <td colspan="4">На сумму </td>
      <td style="font-weight: 700"><?php echo $session['cart.totalSum']; ?> рублей</td>
    </tr>
    </tbody>

  </table>
<?php } else  { ?>
        <h2>Корзина пуста</h2>
<?php }  ?>
