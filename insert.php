<?php

$mok = $_POST["mok"];
$shu = $_POST["shu"];
$life = $_POST["life"];
$enj = $_POST["enj"];
$par = $_POST["par"];
$waru = $par / 100;
$cho = ($shu - $life - $enj) * $waru;
$kekka = $mok / $cho;

// echo "<p>".$waru."</p>";
// echo "<p>".ceil($cho)."</p>";
// echo "<p>".ceil($kekka)."</p>";

try {
    $pdo = new PDO('mysql:dbname=chokin;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMesseage());
}

$sql = "INSERT INTO sim(id, mok, shu, life, enj, cho, kekka )
        VALUES(NULL, :mok, :shu, :life, :enj, :cho, :kekka)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mok', $mok, PDO::PARAM_STR);
$stmt->bindValue(':shu', $shu, PDO::PARAM_STR);
$stmt->bindValue(':life', $life, PDO::PARAM_STR);
$stmt->bindValue(':enj', $enj, PDO::PARAM_STR);
$stmt->bindValue(':cho', $cho, PDO::PARAM_STR);
$stmt->bindValue(':kekka', $kekka, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    header("Location: index.php");
    exit;
}


?>