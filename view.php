<?php

$id = $_GET["id"];

session_start();
include("funcs.php");
loginCheck();
$pdo = db_connect();

$sql = "SELECT * FROM sim WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = "";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
        $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>貯金シミュレーター</title>
</head>

<body>
<h1>貯金シミュレーターα</h1>
<p><a href="select.php"　class="link">登録一覧へ</a><br>
<a href="logout.php"　class="">ログアウト</a></p>
    <form action="update.php" method="post">
        <p>目標金額：<input type="number" name="mok" value="<?=$row["mok"]?>" min="1">万円</p>
        <p>収入：<input type="number" name="shu" value="<?=$row["shu"]?>" min="0">万円</p>
        <p>生活費：<input type="number" name="life" value="<?=$row["life"]?>" min="0">万円</p>
        <p>交際費：<input type="number" name="enj" value="<?=$row["enj"]?>" min="0">万円</p>
        <p>貯金割合：<input type="number" name="par" value="<?=$row["par"]?>" min="1" max="100">％</p>
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <p><input type="submit" value="計算"></p>
    </form>
</body>
</html>