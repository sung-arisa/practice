<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>index-xfree.php</title>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyD4vKv-QsZcAmM3x9axSoaDGzPAxQZJOrQ&language=ja"></script>
    <style>
    html { height: 100% }
    body { height: 100% }
    #map { height: 50%; width: 20%}
    </style>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <?php
    ini_set('display_errors', 'On');
    require_once('data.php');
    ?>
    <div class="header">
      <div class="header-logo">桜 cafe</div>
      <div class="header-list">
        <ul>
          <li><a href="login-xfree.php">ログイン</a></li>
          <li><a href="register-xfree.php">新規会員登録</a></li>
          <li><a href="review-xfree.php">お客様の声</a></li>
        </ul>
      </div>
    </div>

    <div class="main">
      <form action="login-xfree.php" method="post">
      <?php foreach($menus as $menu): ?>
        <img src="<?php echo $menu->getImage() ?>" class = "img">
        <h3 class = "name"><?php echo $menu->getName() ?></h3>
        <p class = "price"><?php echo $menu->getTaxPrice()."円(税込)" ?></p>
        <p class = "count"><input type = "text" value = "0" name = "<?php echo $menu->getName() ?>">個</p>
      <?php endforeach ?>
      <p class = "form"><input type = "submit" value ="注文する"></p>
      </form>
    </div>
   <h3>場所：〒100-0005 東京都千代田区丸の内１丁目</h3>
   <div class="map" id="map" >
   <script>
   var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
   var Options = {
    zoom: 15,      //地図の縮尺値
    center: MyLatLng,    //地図の中心座標
    mapTypeId: 'roadmap'   //地図の種類
   };
   var map = new google.maps.Map(document.getElementById('map'), Options);
   </script>
  </div>
  </body>
</html>
