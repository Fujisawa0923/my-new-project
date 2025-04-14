-- どのツイートにもリプライをしていないユーザーの名前と姓を取得してください。
localhost/twitter/users/		http://localhost/phpmyadmin/index.php?route=/table/sql&db=twitter&table=replys

   行 0 -  9 の表示 (合計 10, クエリの実行時間： 0.0009 秒。)


SELECT users.first_name, users.last_name
FROM users
LEFT JOIN replys ON users.id = replys.user_id
WHERE replys.user_id IS NULL;


first_name	last_name	
John	Doe	
Jane	Smith	
Alice	Johnson	
Bob	Williams	
Charlie	Brown	
David	Miller	
Eve	Davis	
Frank	Wilson	
Grace	Moore	
Hannah	Taylor	
