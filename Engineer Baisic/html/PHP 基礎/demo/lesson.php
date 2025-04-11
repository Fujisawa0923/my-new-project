<?php
  // lesson1
  // 問1
  // messageを呼び出し
  $message = "Hello World";
  echo $message . "\n";
?>

<!-- 問2 -->
  <!-- Welcomeの後nameをつける -->
<?php
  $name = "Fujisawa";
  echo "Welcome $name". "\n";
?>

<!-- 問3 -->
<?php
  //変数でりんごとオレンジの価格と個数を設定する 
  $apple_price = 200;
  $apple_count = 3;

  $orange_price = 100;
  $orange_count = 4;

  //それぞれを式に当てはめる
  $total = ($apple_price * $apple_count) + ($orange_price * $orange_count);
  //式と値を表示させる
 echo "合計金額は($apple_price × $apple_count) + ($orange_price × $orange_count)=" . $total . " 円です。\n";
?>

<!-- 問4 -->
<?php
  // ayyayで同一のデータを配列する。左から［0］［1］［2］と表記
  $colors = array("red", "blue", "green");
  // blueを表示させたいので［1］を選択
  echo $colors[1] . "\n"; 
?>

<!-- 問5 -->
<?php
 $ages = [
    "田中" => 25,
    "佐藤" => 30,
    "鈴木" => 28
];
$jobs = [
    "田中" => "営業",
    "佐藤" => "事務",
    "鈴木" => "社長"
];

 echo "田中さんの年齢は " . $ages["田中"] . " 歳です。\n";
?>

<!-- lesson2 -->
 <!-- 問1 -->
<?php
  // 変数AとBに数値を代入
  $A = 4;
  $B = 5;

  // 大きい方の変数名を表示
  if ($A > $B) {
      echo "Aが大きいです。";
  } elseif ($A < $B) {
      echo "Bが大きいです。";
  } else {
      echo "AとBは同じです。";
  }
  echo "\n";
?>

<!-- 問2 -->
<?php
  // 変数に数値を代入
  $number = 1;

  // 奇数か偶数かを判別
  if ($number % 2 == 0) {
      echo $number . " は偶数です。";
  } else {
      echo $number . " は奇数です。";
  }
  echo "\n";
?>

<!-- 問3 -->
<?php
 // ifを使って条件分岐
 $score = 55;
  if ($score >=100){
    echo "AA";
  } else if ($score >=90){
    echo "A";
  } else if ($score >=80){
    echo "B";
  } else if ($score >=70){
    echo "C";
  } else if ($score >=60){
    echo "D";
  } else {
    echo "E";
  }
  
  echo "\n";

?>

<!-- 問4 -->
<?php
  // 整数を変数に代入
  $number = 10;

  // 判定処理
  if ($number > 0) {
      echo "正の数です";
  } elseif ($number < 0) {
      echo "負の数です";
  } else {
      echo "ゼロです";
  }
  echo "\n";
?>

<!-- 問5 -->
<?php
  // 年齢を変数に代入
  $age = 22;

  // バス料金の判定
  if ($age >= 0 && $age <= 5) {
      echo "バス料金は無料です。";
  } elseif ($age >= 6 && $age <= 12) {
      echo "バス料金は200円です。";
  } elseif ($age >= 13 && $age <= 70) {
      echo "バス料金は500円です。";
  } elseif ($age > 70) {
      echo "バス料金は無料です。";
  } else {
      echo "正しい年齢を入力してください。";
  }
  echo "\n";
?>
