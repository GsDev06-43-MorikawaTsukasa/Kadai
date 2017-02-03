<?php
//1. POSTデータ取得
$book_name   = $_POST["book_name"];
$book_url  = $_POST["book_url"];
$book_comm = $_POST["book_comm"];

//2. DB接続します
try {
//DB商品名：dbname=DB名前
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成 セキュリティの関係からバインドバリューとして準備する
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, book_name, book_url, book_comm,
regi_time )VALUES(NULL, :book_name, :book_url, :book_comm, sysdate())");
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_comm', $book_comm, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト 【ポイント】index.phpの前に半角スペース
  header("Location: index2.php");
  exit;

}
?>
