<?php

try {
    $pdo = new PDO('mysql:dbname=chokin;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMesseage());
}

$sql = "SELECT * FROM sim";
$stmt = $pdo->prepare($sql);
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
        $view .="</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録一覧</title>
</head>
<body>
    <div><?=$view?></div>
    <p><a href = index.php>登録画面へ</a><br></p>
</body>
</html>