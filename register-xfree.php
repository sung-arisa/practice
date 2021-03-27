<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>register-xfree</title>
    <link rel="stylesheet" href="progate.css">
  </head>
  <body>
    <p>新規会員登録<p>
    <form action="sent-xfree.php" method="post">
      <input type = "text" name = "name" placeholder="ユーザー名"><br>
      <input type = "text" name = "email" placeholder="メールアドレス"><br>
      <input type = "text" name = "pass" placeholder="パスワード"><br>
      <input type = "submit">
    </form><br>

    <p>ログイン</p>
    <form action="login-xfree.php" method="post">
      <input type="submit" value="ログイン画面へ">
    </form>

    <p>TOP画面</p>
    <form action="index-xfree.php" method="post">
      <input type="submit" value="TOP画面へ">
    </form>
  </body>
</html>
