<?php

$mok = $_POST["mok"];
$shu = $_POST["shu"];
$life = $_POST["life"];
$enj = $_POST["enj"];
$par = $_POST["par"];
$waru = $par / 100;
$cho = ($shu - $life - $enj) * $waru;

if( $cho < 0 ){
    $cho = 0;
    $kekka = 0;
    echo "そのままだと一生お金はたまりません！！！";
} else{
    $kekka = $mok / $cho;
    echo "<p>"."毎月".$par."%貯金すると"."</p>";
    echo "<p>"."毎月の貯金額：".$cho."万円"."</p>";
    echo "<p>"."目標金額まで約".ceil($kekka)."ヶ月かかります。"."</p>";
    echo "<a href = index.php>登録画面へ</a><br>";
    echo "<a href = select.php>登録一覧</a>";
}

try {
    $pdo = new PDO('mysql:dbname=chokin;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMesseage());
}

$sql = "INSERT INTO sim(id, mok, shu, life, enj, cho, kekka )
        VALUES(NULL, :mok, :shu, :life, :enj, :cho, :kekka)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mok', $mok, PDO::PARAM_INT);
$stmt->bindValue(':shu', $shu, PDO::PARAM_INT);
$stmt->bindValue(':life', $life, PDO::PARAM_INT);
$stmt->bindValue(':enj', $enj, PDO::PARAM_INT);
$stmt->bindValue(':cho', $cho, PDO::PARAM_Int);
$stmt->bindValue(':kekka', $kekka, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    exit;
}

?>