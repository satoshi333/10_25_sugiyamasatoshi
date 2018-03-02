<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>エアロリハユザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
      <div class="container-fluid" style="color:grey;"> </div>
      <div class="navbar-header"><a class="navbar-brand" href="https://satos31.wixsite.com/mysite">Top Page</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="https://satos31.wixsite.com/mysite"></a></div>
<!--
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
        <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザ一覧</a></div>
-->
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!--疑問 action="insert.php"-->
<form method="post" action="insert.php">
  <div class="jumbotron">
  <fieldset>
<!--   <div style="text-align: center;">-->
    <legend style="text-align: center;">エアロ リハ新規登録</legend>
<!--    <div style="text-align: center width: 1000px;">-->
     <div style="text-align: right; margin-left: auto; margin-right: auto; width: 350px;">
     <label>施設名：<input type="text" name="name"></label><br>
     <label>メール：<input type="text" name="email"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>パスワード：<input type="text" name="lpw"></label><br>
     <p style="font-size: 14px;">利用規約・プライバシーポリシーを<br>確認の上送信を押してください</p>
<!--     リンクを作成すること　１、利用規約　２、プライバシーポリシー-->
     </div>
<!--    </div>-->
     <div style="text-align: center;">
<!--
     <input type="radio" name="kanri_flg" value="0">一般者
     <input type="radio" name="kanri_flg" value="1">管理者<br>
     <input type="radio" name="life_flg" value="0">使用中
     <input type="radio" name="life_flg" value="1">未使用<br>
-->
     <input type="submit" value="送信">
     </div>
<!--     </div>-->
    </fieldset>
  

  </div>
</form>
<!-- Main[End] -->


</body>
</html>