<?php

$id = $_GET["id"];

session_start();
include("funcs.php");
loginCheck();
$pdo = db_connect();

$sql = "DELETE FROM sim WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header("Location: select.php");
    exit;
}

?>