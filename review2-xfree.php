<!DOCTYPE html>
<html lang=ja>
  <head>
    <meta charset="utf-8">
    <title>review2</title>
    <link rel="stylesheet" href="review.css">
  </head>
  <body>
    <div class="header">
      <h3 class="header-logo">お客様の声</h3>
      <p class = "message">ご意見、ご感想等いただけますと幸いです。</p>
      <a href="index2-xfree.php" class = "link">TOP画面へ</a>
    </div>
    <div class="main">
        <form action = "review2-xfree.php" method = "post">
            <input type = "text" name = "comment" placeholder="コメント">
            <input type = "submit">
        </form>
        <form action = "review2-xfree.php" method = "post">
            <input type = "number" name = "editNum" placeholder="編集番号">
            <input type = "text" name = "edit" placeholder="コメント">
            <input type = "submit" value="編集">
        </form>
        <form action = "review2-xfree.php" method = "post">
            <input type = "number" name = "delNum" placeholder="削除番号">
            <input type = "submit" value = "削除">
        </form>



      <?php
      //エラー表示
      ini_set('display_errors',"On");

      // ドライバ呼び出しを使用して MySQL データベースに接続します
      $dsn = 'mysql:dbname=making_making;host=mysql1.php.xdomain.ne.jp';
      $user = 'making_root';
      $password = 'root0910';

      try {
        $dbh = new PDO($dsn, $user, $password);
        echo "";
      } catch (PDOException $e) {
        echo "接続失敗: " . $e->getMessage() . "\n<br>";
        exit();
      }

      //データベース操作（SELECT,INSERT,UPDATE,DELETE)
      //新規投稿の場合
      if(!empty($_POST["comment"])){

        $comment = $_POST["comment"];
        $date = date("Y/m/d G:i:s");

        try {
          $stmt = $dbh->prepare("INSERT INTO comments (comment, date) VALUES (:comment, :date)");
          $stmt->bindValue(':comment', "$comment");
          $stmt->bindValue(':date', "$date");
          $stmt->execute();

        } catch(PDOException $e) {
          echo $e->getMessage();
          die();
        }
        //編集中の場合
      }elseif(!empty($_POST["editNum"]) && !empty($_POST["edit"])){

        $editNum = $_POST["editNum"];
        $edit = $_POST["edit"];

        try{
          $dbh = new PDO($dsn, $user, $password);

          $stmt = $dbh->prepare("UPDATE comments SET comment = :comment WHERE id = :id");
          $stmt->bindValue(':id', "$editNum", PDO::PARAM_INT);
          $stmt->bindValue(':comment', "$edit", PDO::PARAM_STR);
          $stmt->execute();

        } catch(PDOException $e){
          echo $e->getMessage();
          die();
        }
        //削除の場合
      }elseif(!empty($_POST["delNum"])){

        $delNum = $_POST["delNum"];

        try{
          $stmt = $dbh->prepare("DELETE FROM comments WHERE id = :id");
          $stmt->bindValue(':id', "$delNum", PDO::PARAM_INT);
          $stmt->execute();

        } catch(PDOException $e){
          echo $e->getMessage();
          die();
        }

        //何も入力がないとき
      }else{
        echo "";
      }


      //データベース内容表示
      //削除の場合には、連番の振りなおしをせねば。　表示直前に連番振りなおし。
      //コメント「id」全部抽出→全部削除→全部振りなおし（foreach
      try {
        $stmt = $dbh->prepare("UPDATE comments SET id = 0; UPDATE comments SET id += 1");
        $stmt->execute();

      } catch (PDOException $e) {
        echo $e->getMessage();
        die();
      }

      try{
        $stmt = $dbh->query("SELECT * FROM comments");
        foreach ($stmt as $row){
          echo"・".$row["comment"]." ".$row["date"]."<br>";
        }
      } catch(PDOException $e){
        echo $e->getMessage();
        die();
      }
      ?>
      </div>
  </body>
</html>
