<!DOCTYPE html>
<html lang=ja>
  <head>
    <meta charset="utf-8">
    <title>top-xfree</title>
  </head>
  <body>
    <?php
    //エラー表示
    ini_set('display_errors',"On");

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

    //ログイン情報と登録情報の一致を判断する
    //passの認証方法に関しては、特別な関数があるらしいから、それを利用できるとよい。
    if($_POST["name"] != null && $_POST["email"] != null && $_POST["pass"] != null){
      try {
        $dbh = new PDO($dsn, $user, $password);
        //$sqlに問題あり name = $_POST["name"]にすると途端におかしくなる。sqlに$_POST値代入するにはどうやらプリペアードステートメントやbindParamを使わないといけないみたい。
        //ユーザー入力を受け取ってSQL文を動的に生成する場合は プリペアドステートメント と プレースホルダ を使わなければなりません．
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $stmt = $dbh->prepare("SELECT * FROM users WHERE name = ? AND email = ? AND pass = ?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $pass);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      }catch(PDOException $e) {
	       echo $e->getMessage();
         echo "リベンジ";
	       die();
      }

      //$result["name"]が存在しない時、エラー表示出るのは、while文で解消できそう
      //if($result["name"] == null)ではなく、下記の様にしたら、できた。
      if(empty($result["name"]) || empty($result["email"]) || empty($result["pass"])){
        echo "ログイン情報が一致しません。再度ログインしてください。";
      }elseif ($_POST["name"] == $result["name"] && $_POST["email"] == $result["email"] && $_POST["pass"] == $result["pass"]) {
        echo "<a href = index2.php>ログイン成功！TOP画面へ</a>";
      }else{
      echo "ログイン情報が一致しません。";
      }

    }else{
     echo "ログイン情報が不足しています。再度ログインしてください。";
     }

     ?>
  </body>
</html>
