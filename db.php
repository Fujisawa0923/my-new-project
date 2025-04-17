<?php
$host = 'localhost';
$dbname = 'bbs';  // ここで作成したデータベース名を指定
$username = 'root';  // MySQLのユーザー名
$password = '';      // MySQLのパスワード（空白の場合もあります）

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage();
    exit;
}
?>
