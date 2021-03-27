<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>data.php</title>
  </head>
  <body>
    <?php
    ini_set('display_errors','On');

    require_once('menu.php');
    $pizza = new Menu('蕎麦', 1000, 'https://d1f5hsy4d47upe.cloudfront.net/4b/4bdd906384f013597f1c66ff1928d1ba_t.jpeg');
    $pasta = new Menu('さんま定食', 1000, 'https://d1f5hsy4d47upe.cloudfront.net/1f/1f9e79e5b0223445c0732f2b8f4b1eae_t.jpeg');
    $coffee = new Menu('桜餅', 300, 'https://d1f5hsy4d47upe.cloudfront.net/28/2887dace91f83af221a01c136cbaf8b6_t.jpeg');
    $juice = new Menu('緑茶', 300, 'https://d1f5hsy4d47upe.cloudfront.net/21/21896f43e34644515888a773ab12be9c_t.jpeg');

    $menus = array($pizza, $pasta, $coffee, $juice);
    ?>
  </body>
</html>
