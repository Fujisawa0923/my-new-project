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
 