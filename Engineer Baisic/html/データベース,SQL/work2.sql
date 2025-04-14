
-- 「John Doe」が投稿したツイートをすべて取得してください。

localhost/twitter/tweets/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=twitter&table=tweets

   行 0 -  1 の表示 (合計 2, クエリの実行時間： 0.0002 秒。)


SELECT tweets.*FROM users
JOIN tweets ON users.id = tweets.user_id
WHERE users.first_name = 'John'
  AND users.last_name = 'Doe';


id	user_id	tweet	
1	1	Just had a great lunch!	
11	1	Just had a great lunch!	

