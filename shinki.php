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