<?php

//以下、関数を利用する宣言 include~
include("functions.php");

//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$email   = $_POST["email"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();

//以下が関数の中身：
//try {
//  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
//} catch (PDOException $e) {
//  exit('DbConnectError:'.$e->getMessage());
//}

//3.UPDATE gs_user_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name, email=:email, lid=:lid, lpw=:lpw WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);//一度vindValueに入れてから上のprepareに代入
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
//$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();//実行

if($status==false){
  queryError($stmt);
}else{
  header("Location: select.php");//select.phpへ
  exit;
}

?>
