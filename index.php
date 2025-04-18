<?php
// 入力チェック & 投稿処理
$message_array = [];

if (!empty($_POST['btn_submit'])) {
    $view_name = htmlspecialchars($_POST['view_name'], ENT_QUOTES, 'UTF-8');
    $title_name = htmlspecialchars($_POST['title_name'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $post_time = date("Y-m-d H:i:s");

    if ($view_name !== '' && $message !== '') {
        // 配列に追加（本来はDBに保存するところ）
        $message_array[] = [
            'view_name' => $view_name,
            'title_name' => $title_name,
            'message' => $message,
            'post_date' => $post_time
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>掲示板</title>
<!-- （CSSは省略） -->
</head>
<body>
<h1>掲示板</h1>
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

<section>
<?php if (!empty($message_array)): ?>
  <?php foreach ($message_array as $message): ?>
    <article>
      <div class="info">
        <h2><?php echo $message['title_name'] ?>（<?php echo $message['view_name'] ?>）</h2>
        <time><?php echo $message['post_date'] ?></time>
      </div>
      <p><?php echo nl2br($message['message']) ?></p>
    </article>
  <?php endforeach; ?>
<?php endif; ?>
</section>
</body>
</html>
