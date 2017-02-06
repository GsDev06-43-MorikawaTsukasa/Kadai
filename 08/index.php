<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ入力画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
      div{
          padding: 10px;font-size:16px;
      }
      .jumbotron{
          padding-left: 80px;
      }
      
  </style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザ入力画面</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザ情報</legend>
     <label>ユーザ名　　　　：<input type="text" name="name"></label><br>
     <label>ユーザID　　　　：<input type="text" name="lid"></label><br>
     <label>ユーザパスワード：<input type="text" name="lpw"></label><br>
     <label>使用種別　　　　：<select name="kanri_flg">
         <option value="0">一般者</option>
         <option value="1">管理者</option>
     </select></label><br>
     <label>使用状態　　　　：<select name="life_flg">
         <option value="0">使用中</option>
         <option value="1">未使用</option>
     </select></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
