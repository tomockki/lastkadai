<?php

$id = $_GET["id"];

try {
    $pdo = new PDO('mysql:dbname=chokin;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMesseage());
}

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