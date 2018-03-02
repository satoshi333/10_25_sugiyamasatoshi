<?php

//exit();
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];
//echo"GET:".$id;

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//*以下の２行は同時に記載可能か？それともどちらかのみか？
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
//$stmt = $pdo->prepare("DELETE * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）ここは決まり文句
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる while以下は元の文
//  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $view .='<p>';
//    $view .= '<a href="detail.php?id='.$result["id"].'">';
//    $view .= $result["name"]."[".$result["indate"]."]";
//    $view .='</a>';
//    $view .='</P>';
    //$row以下は省略形？
    $row = $stmt->fetch();
  }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>VRエアロ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid"></div>
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!--疑問 action="update.php"-->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend style=margin-left:280px;>VRエアロ登録変更</legend>
     <label style=margin-left:170px;>氏名：<input type="text" name="name" style="margin-left: 60px;" value="<?=$row["name"]?>"></label><br>
     <label style=margin-left:170px;>メール：<input type="text" name="email" style="margin-left: 45px;" value="<?=$row["email"]?>"></label><br>
     <label style=margin-left:170px;>ID：<input type="text" name="lid" style="margin-left: 75px;" value="<?=$row["lid"]?>"></label><br>
     <label style="margin-left:170px;">パスワード：<input type="text" name="lpw" style="margin-left: 13px; " value="<?=$row["lpw"]?>"></label><br>
     <input type="submit" value="送信" style="margin-left:350px;">
     <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>



