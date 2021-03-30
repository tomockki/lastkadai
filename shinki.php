<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include("funcs.php");

if(
    !isset($_POST["u_name"]) || $_POST["u_name"] == "" ||
    !isset($_POST["u_id"]) || $_POST["u_id"] == "" ||
    !isset($_POST["u_pw"]) || $_POST["u_pw"] == ""
){
    echo '<p class="minyu">'."未入力の箇所があります。"."</p>";
    echo "<p><a href = touroku.php>登録画面へ</a></p>";
    exit;
}

$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];
$life_flg = $_POST["life_flg"];

$pdo = db_connect();

$sql = "SELECT * FROM user_login WHERE u_id = :u_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}

$id_chk = $stmt->fetch();

if($id_chk > 0 ){
    echo "<p>そのID(".$u_id.")はすでに利用されています。</p>";
    echo "<p><a href = touroku.php>登録画面へ戻る</a></p>";
    exit;
}

$sql = "INSERT INTO user_login(id, u_name, u_id, u_pw, life_flg, indate)
        VALUES(NULL, :u_name, :u_id, :u_pw, :life_flg, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':u_pw', $u_pw, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    header("Location: login.php");
    exit;
}


?>
</body>
</html>