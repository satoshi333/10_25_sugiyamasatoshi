<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DBへ接続する関数（PDO）書き方➡︎　$pdo = db_con();

function db_con(){
  $dbname='gs_db09';
  try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError($stmt){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

/**
* XSS セキュリティ対策
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

//checkssid (SESSIONチェック)ログインしていない時は見えない画面にする　　書き方➡︎chkSsid();
function chkSsid(){
    if( !isset($_SESSION["chk_ssid"]) || 
        $_SESSION["chk_ssid"] != session_id()){
        exit("LOGIN ERROR"); 
    }else{
      session_regenerate_id(true); 
      $_SESSION["chk_ssid"] = session_id();
    }
}

?>
