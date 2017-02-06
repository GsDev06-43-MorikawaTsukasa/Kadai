<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

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
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<p>';
      $view .= '<a href="detail.php?id='.$res["id"].'">';
      $view .= "ユーザ名：".$res["name"]."<br>"."ユーザID：".$res["lid"]."<br>"."ユーザパスワード：".$res["lpw"]."<br>"."使用種別：".$res["kanri_flg"]."<br>"."使用状態：".$res["life_flg"]."<br>";
      $view .= '</a>';
    $view .=" ";
    $view .= '<a href = "delete.php?id='.$res["id"].'">';
    $view .= "削除";
    $view .="</a>";
    $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザ登録情報</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="http://calil.jp/public/css/calilapi.css" rel="stylesheet" type="text/css" />
<style>
    div{
        padding: 10px;
        font-size:16px;
    }


</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ユーザ登録情報</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<!-- Main[End] -->

</body>
</html>
