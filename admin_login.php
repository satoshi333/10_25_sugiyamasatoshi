<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>管理者ログイン</title>
</head>

<body style="text-align:center;">

<div>
<header>
  <div class="navbar-header" style="color:black;"><a class="navbar-brand" href="https://satos31.wixsite.com/mysite">Top Page</a></div><br>
  <div class="navbar navbar-default" style="width: 180px;
    vertical-align:middle; margin-top:80px;  margin-left:650px;">
    管理者<br>
    ログインフォーム</div>
</header>
</div>

<header>

<!--class="navbar navbar-default"-->
<!--
<header style="margin-top:200px;">
    <p style="text-align:center;">ログインフォーム</p>
</header>
-->

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="admin_login_act.php" method="post">
<label style="margin-top:30px; margin-left:50px;">ID:<input type="text" name="lid" placeholder="ID"/></label><br>
<label style="margin-left:43px;">PW:<input type="text" name="lpw" placeholder="パスワード"/></label><br>
<!--自動的にログインするにはどうしたら良いか？-->
<!--<P><input type="checkbox" name="checkbox" value="checkbox" style="margin-left: 55px;">次回から自動的にログイン</P>-->
<input type="submit" value="ログインする" style="margin-left:80px;"><br>
<!--パスワードをお忘れの時の処理を書くこと！-->
<!--
<span style="margin-left:70px;">＊パスワードをお忘れの方はこちら</span>
<p>
    <a href="index.php" style="margin-left:90px;">新規会員登録はこちら</a>
</p>
-->
</form>


</body>
</html>