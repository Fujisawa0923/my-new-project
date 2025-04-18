<?php
date_default_timezone_set('Asia/Tokyo'); 
require 'db.php';

// 削除処理
if (isset($_POST['btn_delete']) && isset($_POST['delete_id'])) {
    $delete_id = (int) $_POST['delete_id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM message_board WHERE id = ?");
        $stmt->execute([$delete_id]);
        header('Location: post.php');
        exit;
    } catch (PDOException $e) {
        echo '削除エラー: ' . $e->getMessage();
    }
}

// 投稿処理
if (isset($_POST['btn_submit'])) {
    $view_name = htmlspecialchars($_POST['view_name'], ENT_QUOTES, 'UTF-8');
    $title_name = htmlspecialchars($_POST['title_name'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $post_time = date("Y-m-d H:i:s");

    if ($view_name !== '' && $message !== '') {
        try {
            $stmt = $pdo->prepare("INSERT INTO message_board (view_name, title_name, message, post_date) VALUES (?, ?, ?, ?)");
            $stmt->execute([$view_name, $title_name, $message, $post_time]);
            header('Location: post.php');
            exit;
        } catch (PDOException $e) {
            echo 'データベースエラー: ' . $e->getMessage();
        }
    }
}

// 投稿一覧取得
$stmt = $pdo->query("SELECT * FROM message_board ORDER BY post_date DESC");

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>掲示板</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>掲示板</h1>

<!-- 投稿フォーム -->
<form method="post">
  <div>
    <label for="view_name">投稿者</label>
    <input id="view_name" type="text" name="view_name" value="">
  </div>
  <div>
    <label for="title_name">タイトル</label>
    <input id="title_name" type="text" name="title_name" value="">
  </div>
  <div>
    <label for="message">投稿内容</label>
    <textarea id="message" name="message"></textarea>
  </div>
  <input type="submit" name="btn_submit" value="投稿">
</form>

<hr>

<!-- 投稿一覧 -->
<section>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<article>';
    echo '<div class="info">';
    echo '<h2>' . htmlspecialchars($row['title_name'], ENT_QUOTES, 'UTF-8') . '（' . htmlspecialchars($row['view_name'], ENT_QUOTES, 'UTF-8') . '）</h2>';
    echo '<time>' . htmlspecialchars($row['post_date'], ENT_QUOTES, 'UTF-8') . '</time>';
    echo '</div>';
    echo '<p>' . nl2br(htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8')) . '</p>';
    
    // 「コメントを見る」ボタン
    echo '<form action="comments.php" method="get">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<input type="submit" value="コメントを見る">';
    echo '</form>';
    
    // 削除ボタン
    echo '<form method="post" onsubmit="return confirm(\'本当に削除しますか？\');">';
    echo '<input type="hidden" name="delete_id" value="' . $row['id'] . '">';
    echo '<input type="submit" name="btn_delete" value="削除">';
    echo '</form>';

    echo '</article><hr>';
}
?>
</section>
</body>
</html>
