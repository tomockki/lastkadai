<?php

function loginCheck(){
    if(
        !isset($_SESSION["chk_ssid"]) ||
        $_SESSION["chk_ssid"] != session_id()){
            echo "<p>LOGIN ERROR!</p>";
            echo "<p><a href = login.php>ログイン画面へ</a></p>";
            exit();
        }else{
            session_regenerate_id(true);
            $_SESSION["chk_ssid"] = session_id();
        }
}

function db_connect(){
    try {
        $pdo = new PDO('mysql:dbname=chokin;charset=utf8;host=localhost', 'root', 'root');
    } catch (PDOException $e) {
        exit('DbConnectError:'.$e->getMesseage());
    }
    return $pdo;
}

?>