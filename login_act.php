<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

echo $lid."<br>".$lpw;

include("funcs.php");
$pdo = db_connect();

$sql = "SELECT * FROM user_login WHERE u_id = :lid AND u_pw = :lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}

$val = $stmt->fetch();

if( $val["id"] != ""){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["u_name"]  = $val['u_name'];
    header("Location: select.php");
}else{
    header("Location: login.php");
}

exit();

?>