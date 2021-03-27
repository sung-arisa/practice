<!DOCTYPE html>
<html lang=ja>
  <head>
    <meta charset="utf-8">
    <title>login-xfree</title>
  </head>
  <body>
    <p>コメント投稿や料理注文をご利用される方は、ログインをお願いいたします。</p>
    <p>未登録の方は、新規会員登録後にログインをお願いいたします。</p>
    <p>ログイン</p>
    <form action="top-xfree.php" method="post">
      <input type = "text" name = "name" placeholder="ユーザー名"><br>
      <input type = "text" name = "email" placeholder="メールアドレス"><br>
      <input type = "password" name = "pass" placeholder="パスワード"><br>
      <input type = "submit">
    </form><br>

    <p>新規会員登録</p>
    <form action="register-xfree.php" method="post">
      <input type="submit" value="新規会員登録画面へ">
    </form>

    <p>TOP画面</p>
    <form action="index-xfree.php" method="post">
      <input type="submit" value="TOP画面へ">
    </form>

  </body>
</html>
