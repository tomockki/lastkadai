<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>新規登録</title>
</head>
<h1>貯金シミュレーターα新規登録</h1>
<p>登録済みの方は<a href="login.php">ログイン画面</a>へ</p>
<body>
    <form action="shinki.php" method="post">
        <p>お名前：<input type="text" name="u_name"></p>
        <p>ID：<input type="text" name="u_id"></p>
        <p>パスワード：<input type="text" name="u_pw"></p>
        <input type="hidden" name="life_flg" value="0">
        <input type="submit" value="新規登録">
    </form>
</body>
</html>