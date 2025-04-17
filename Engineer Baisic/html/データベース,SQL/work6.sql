-- もっともリプライが多いツイートのIDとリプライ数を取得してください。

localhost/twitter/replys/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=twitter&table=users
SQL は正常に実行されました。

SELECT tweet_id, COUNT(*) AS reply_count -- ツイートごとにグループ化し、そのツイートに対するリプライ数を数える
FROM replys
GROUP BY tweet_id
ORDER BY reply_count DESC
LIMIT 1;



1	2	
