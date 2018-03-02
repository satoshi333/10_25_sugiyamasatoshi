
<!DOCTYPE html>


<html lang="ja">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>エアロユザー登録</title>

<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <p style=" color:white; font-size:30px;">管理者画面</p>
      <a class="navbar-brand" href="index.php">データ登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      <a class="navbar-brand" href="https://satos31.wixsite.com/mysite">Top page</a>
      
<!--      <a class="navbar-brand" href="logout.php">管理者画面</a>-->
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!--
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
-->
<table id="table1" border='1' align="center" width="1000">

  <tr>
    <th style="text-align:center;">氏名</th>
    <th style="text-align:center;">メール</th>
    <th style="text-align:center;">ID</th>
    <th style="text-align:center;">パスワード</th>
    <th style="text-align:center;">変更</th>
    <th style="text-align:center;">削除</th>
  </tr>
<!-- Main[End] -->


<?php
session_start();

include("functions.php");

//セッションチェック関数使用（functions.php参照）

chkSsid();


//1.  DB接続します　関数使用（functions.php参照）

 $pdo = db_con();

//try {
//  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
//} catch (PDOException $e) {
//  exit('データベースに接続できませんでした。'.$e->getMessage());
//}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<tr>';
//    $view .= '<a href="detail.php?id='.$result["id"].'">';
        
//    $view .= "<td>".$result["name"]."</td>"."</td>"."<td>".$result["email"]."</td>"."<td>".$result["lid"]."</td>"."<td>".$result["lpw"]."</td>";
//
        
     
     $view .= "<td>".$result["name"]."</td>";
     $view .= "<td>".$result["email"]."</td>";
     $view .= "<td>".$result["lid"]."</td>";
     $view .= "<td>".$result["lpw"]."</td>";
     
    $view .= '<td style="text-align:center;"><a href="detail.php?id='.$result["id"].'">'.'変更</a></td>';
    $view .= '<td style="text-align:center;"><a href="delete.php?id='.$result["id"].'">'.'削除</a></td>';
        
//    $view .='</a>';
//      以下の４行でPHPデータベースの接続（リンク作成＞データ削除）
    $view .=' ';
//    $view .= '<a href="delete.php?id='.$result["id"].'">';
//    $view .= '削除<br>';
//    $view .='</a>';
    $view .='</tr>';
  }
}
?>

<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

</body>
</html>
