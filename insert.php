<?php
include("functions.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST["name"];
$email   = $_POST["email"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();//関数

//以下が関数の中身：
//try {
//  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
//} catch (PDOException $e) {
//  exit('DbConnectError:'.$e->getMessage());
//}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, email, lid, lpw )VALUES(NULL, :a1, :a2, :a3, :a4)");
$stmt->bindValue(':a1', $name);//(内は名前をつける)
$stmt->bindValue(':a2', $email);
$stmt->bindValue(':a3', $lid);
$stmt->bindValue(':a4', $lpw);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  //header("Location: index.php");//index.phpへ
  header("Location: login.php");
  exit;
}
?>





