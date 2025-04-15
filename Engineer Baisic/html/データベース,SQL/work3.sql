-- 「Jane Smith」が投稿したリプライをすべて取得してください。

localhost/twitter/replys/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=twitter&table=replys

   行 0 -  1 の表示 (合計 2, クエリの実行時間： 0.0002 秒。)


SELECT replys.* --そのユーザーが投稿したすべてのリプライを取得(*)
FROM users
JOIN replys ON users.id = replys.user_id -- ユーザーとリプライを、ユーザーIDで結合
WHERE users.first_name = 'Jane'  -- first_nameとlast_nameが一致するユーザーに絞り込み
  AND users.last_name = 'Smith';


id	tweet_id	user_id	reply	
1	1	2	Sounds delicious!	
11	1	2	Sounds delicious!	
