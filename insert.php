<?php
session_start();
include("funcs.php");
loginCheck();

if(
    !isset($_SESSION["u_id"]) || $_SESSION["u_id"] == "" ||
    !isset($_POST["mok"]) || $_POST["mok"] == "" ||
    !isset($_POST["shu"]) || $_POST["shu"] == "" ||
    !isset($_POST["life"]) || $_POST["life"] == "" ||
    !isset($_POST["enj"]) || $_POST["enj"] == "" ||
    !isset($_POST["par"]) || $_POST["par"] == ""
){
    echo "<p>"."未入力の箇所があります。"."</p>";
    echo "<p><a href = index.php>登録画面へ</a></p>";
    exit;
}
$u_id =$_SESSION["u_id"];
$mok = $_POST["mok"];
$shu = $_POST["shu"];
$life = $_POST["life"];
$enj = $_POST["enj"];
$par = $_POST["par"];
$waru = $par / 100;
$cho = ($shu - $life - $enj) * $waru;

if( $cho <= 0 ){
    $cho = 0;
    $kekka = 0;
    echo "<h1>貯金シミュレーター</h1>";
    echo "<p>貯金額は0円です！</p>";
    echo "<p>そのままだと、一生お金はたまりません！！</p>";
    echo "<p><a href = index.php>登録画面へ</a>"."または"."<a href= logout.php>ログアウト</a></p><br>";
    echo "<a href = select.php>登録一覧</a></p>";
} else{
    $kekka = $mok / $cho;
    echo "<h1>貯金シミュレーター</h1>";
    echo "<p>"."毎月".$par."%貯金すると"."</p>";
    echo "<p>"."毎月の貯金額：".$cho."万円"."</p>";
    echo "<p>"."目標金額まで約".ceil($kekka)."ヶ月かかります。"."</p>";
    echo "<p><a href = index.php>登録画面へ</a>"."または"."<a href= logout.php>ログアウト</a><br>";
    echo "<a href = select.php>登録一覧</a></p>";
}

$pdo = db_connect();

$sql = "INSERT INTO sim(id, u_id, mok, shu, life, enj, par, cho, kekka )
        VALUES(NULL, :u_id, :mok, :shu, :life, :enj, :par, :cho, :kekka)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':mok', $mok, PDO::PARAM_STR);
$stmt->bindValue(':shu', $shu, PDO::PARAM_STR);
$stmt->bindValue(':life', $life, PDO::PARAM_STR);
$stmt->bindValue(':enj', $enj, PDO::PARAM_STR);
$stmt->bindValue(':par', $par, PDO::PARAM_STR);
$stmt->bindValue(':cho', $cho, PDO::PARAM_STR);
$stmt->bindValue(':kekka', $kekka, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    exit;
}

?>



