<!DOCTYPE html>
<html lang=ja>
  <head>
    <meta charset="utf-8">
    <title>sent-xfree</title>
  </head>
  <body>

    <?php
    // ドライバ呼び出しを使用して MySQL データベースに接続します
    $dsn = 'mysql:dbname=making_making;host=mysql1.php.xdomain.ne.jp';
    $user = 'making_root';
    $password = 'root0910';

    try {
      $dbh = new PDO($dsn, $user, $password);
      echo "接続成功\n<br>";
    } catch (PDOException $e) {
      echo "接続失敗: " . $e->getMessage() . "\n<br>";
      exit();
    }

    if($_POST["name"] != null && $_POST["email"] != null && $_POST["pass"] != null){

      $name = $_POST["name"];
      $email = $_POST["email"];
      $pass = $_POST["pass"];

      try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "INSERT INTO users (name, email, pass) VALUES ('$name', '$email', '$pass')";
        $res = $dbh->query($sql);

      } catch(PDOException $e) {
	       echo $e->getMessage();
	       die();
      }

      echo "<p>登録情報</p>";
      echo "ユーザー名：".$name."<br>";
      echo "メールアドレス：".$email."<br>";
      echo "パスワード：".$pass."<br>";
      echo "<p>登録が完了しました！</p>";


    }else{
      echo "登録情報が不足しています。再度、新規登録してください。<br>";
    };
    ?>
    <br>
    <form action="register.php" method="post">
      <input type="submit" value="新規登録画面へ">
    </form><br>

    <form action="login.php" method="post">
      <input type="submit" value="ログイン画面へ">
    </form>


  </body>
</html>
