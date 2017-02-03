<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //$view .= $view.$res..と同じ意味 データを加えていく(.=)
  //$view .= $res["id"].$res["name"].$res["email"];
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>'."書籍名：".$res["book_name"]."<br>"."url：".$res["book_url"]."<br>"."コメント：".$res["book_comm"]."<br>".'</p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録書籍情報</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    div{
        padding: 10px;
        font-size:16px;
    }

    .back{
        padding-left: 80px;
    }
    
    
    


</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index2.php">登録書籍情報</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<div class="back">
<a href="http://localhost/sample07/index2.php">戻る</a>
</div>
<!-- Main[End] -->

</body>
</html>
