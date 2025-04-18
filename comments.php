<?php
date_default_timezone_set('Asia/Tokyo'); 
require 'db.php';

if (!isset($_GET['id'])) {
    echo "投稿が見つかりません。";
    exit;
}

$post_id = (int) $_GET['id'];

// 投稿取得
$stmt = $pdo->prepare("SELECT * FROM message_board WHERE id = ?");
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post) {
    echo "指定された投稿は存在しません。";
    exit;
}

// コメント投稿処理
if (isset($_POST['btn_comment'])) {
    $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
    $commenter = htmlspecialchars($_POST['commenter_name'], ENT_QUOTES, 'UTF-8');
    $comment_date = date("Y-m-d H:i:s");

    if (!empty($comment) && !empty($commenter)) {
        $stmt = $pdo->prepare("INSERT INTO comments (post_id, commenter_name, comment, comment_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$post_id, $commenter, $comment, $comment_date]);
        header("Location: comments.php?id=$post_id");
        exit;
    }
}

// コメント一覧取得
$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date ASC");
$stmt->execute([$post_id]);
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>コメントページ</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>投稿詳細</h2>
<article>
  <h3><?php echo htmlspecialchars($post['title_name'], ENT_QUOTES, 'UTF-8'); ?></h3>
  <p>投稿者: <?php echo htmlspecialchars($post['view_name'], ENT_QUOTES, 'UTF-8'); ?></p>
  <p><?php echo nl2br(htmlspecialchars($post['message'], ENT_QUOTES, 'UTF-8')); ?></p>
  <p>投稿日: <?php echo htmlspecialchars($post['post_date'], ENT_QUOTES, 'UTF-8'); ?></p>
</article>

<hr>

<h3>コメント一覧</h3>
<?php foreach ($comments as $comment): ?>
  <div class="comment">
    <strong><?php echo htmlspecialchars($comment['commenter_name'], ENT_QUOTES, 'UTF-8'); ?></strong><br>
    <?php echo nl2br(htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8')); ?><br>
    <small><?php echo $comment['comment_date']; ?></small>
    <hr>
  </div>
<?php endforeach; ?>

<h3>コメントを投稿する</h3>
<form method="post">
  <input type="text" name="commenter_name" placeholder="名前"><br>
  <textarea name="comment" placeholder="コメントを入力"></textarea><br>
  <input type="submit" name="btn_comment" value="コメント投稿">
</form>

<a href="post.php" class="back-button">← 戻る</a>

</body>
</html>
