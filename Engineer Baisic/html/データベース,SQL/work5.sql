-- 「Charlie Brown」が投稿したツイートの数をカウントしてください。

localhost/twitter/users/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=twitter&table=users
SQL は正常に実行されました。

SELECT COUNT(*) AS tweet_count -- 該当するツイートの件数をカウントし、tweet_count という名前で表示
FROM users
JOIN tweets ON users.id = tweets.user_id -- ユーザーとツイートを、user_idで結合
WHERE users.first_name = 'Charlie' -- 「Charlie Brown」に絞り込み
  AND users.last_name = 'Brown';



2	
