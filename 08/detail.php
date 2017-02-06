<?php
$id = $_GET["id"];
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成(バインド変数)
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindvalue(":id",$id,PDO::PARAM_INT); //STR or INT
$status = $stmt->execute();

//３．データ表示
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]); //2番目が人が見てわかる
}else{
 $res = $stmt->fetch();  //１レコード取得する fetch()
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍情報入力画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザ情報入力画面</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] (?=はphp echoと同義)-->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザ情報</legend>
     <label>ユーザ名　　　　：<input type="text" name="name" value="<?=$res["name"]?>"></label><br>
     <label>ユーザID　　　　：<input type="text" name="lid" value="<?=$res["lid"]?>"></label><br>
     <label>ユーザパスワード：<input type="text" name="lpw" value="<?=$res["lpw"]?>"></label><br>
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
