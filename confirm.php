<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>confirm.php</title>
  </head>
  <body>
    <?php
    require_once('data.php');
    ?>
    <h3>注文確認</h3>
    <?php $totalPayment = 0 ?>

    <?php foreach ($menus as $menu): ?>

    <?php
    $orderCount = $_POST[$menu->getName()];
    $menu->setOrderCount($orderCount);
    $totalPayment += $menu->getTotalPrice();
    ?>

    <p>
    <?php echo $menu->getName() ?>
    ×
    <?php echo $orderCount ?>個
    ＝
    <?php echo $menu->getTotalPrice() ?>円
    </p>
    <?php endforeach ?>
    <h3>注文合計</h3>
    <p><?php echo $totalPayment ?>円(税込)</p>
    
  </body>
</html>
