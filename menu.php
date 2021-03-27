<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>menu.php</title>
  </head>
  <body>
  <?php
  //エラー表示
  ini_set('display_errors','On');

  class Menu{
    private $name;
    private $price;
    private $image;
    private $orderCount = 0;
    //一見すると、コンストラクタのところで、インスタンスのプロパティにプロパティを入れているように見えて、
    //変に感じるかもしれない。
    //private $name と __construct($name)は、同じ$name表記だが、別物である。
    //private $name は　プロパティの意味、 __construct($name)は、コンストラクタの引数という意味
    //以上の通り、別物であるから、コンストラクタの引数を別表記にしても機能する。
    //例）public function __construct($menu_name){
    //     $this->name = $menu_name;}
    //data.phpで生成した「インスタンスの引数はコンストラクタの引数に引き渡される」（順番対応）。
    public function __construct($name, $price, $image){
      $this->name = $name;
      $this->price = $price;
      $this->image = $image;
    }

    public function getName(){
      return $this->name;
    }

    public function getTaxPrice(){
      return floor($this->price * 1.10);
    }

    public function getImage(){
      return $this->image;
    }

    public function setOrderCount($orderCount){
      $this->orderCount = $orderCount;
    }

    public function getOrderCount(){
      return $this->orderCount;
    }

    public function getTotalPrice(){
      return $this->getTaxPrice() * $this->orderCount;
    }
  }



  ?>
  </body>
</html>
