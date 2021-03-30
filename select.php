<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>登録一覧</title>
</head>
<body>
<h1>貯金シミュレーターα登録一覧マイページ</h1>
<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_connect();

$u_id = $_SESSION["u_id"];

$sql = "SELECT * FROM sim WHERE u_id = :u_id ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$status = $stmt->execute();

$view = "";
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<p>";
        $view .= '<a href="view.php?id='.$result["id"].'">';
        $view .="目標金額：".$result["mok"]."万円"."<br>"."収入：".$result["shu"]."万円"."<br>"."生活費：".$result["life"]."万円"."<br>"."交際費：".$result["enj"]."万円"."<br>"."毎月".$result["par"]."％貯金して"."<br>"."毎月の貯金額：約".$result["cho"]."万円<br>"."目標までの期間：約".$result["kekka"]."ヶ月";
        $view .="</a>";
        $view .="<br>";
        $view .='<a href="delete.php?id='.$result["id"].'">';
        $view .="[削除]";
        $view .="</a>";
        $view .="</p>";
    }
}
?>
    <div><?=$view?></div>
    <p><a href = index.php>登録画面へ</a><br><a href= logout.php>ログアウト</a></p>
</body>
</html>