<!-- lesson4 -->
 <!-- 問1 -->
 <?php
for ($i = 1; $i <= 100; $i++) { // 1から100までループさせる
    if ($i % 10 == 0) { // 10の倍数をピックアップ
        echo $i . "\n"; // 指定した数値の呼び出し
    }
}
?>


<!-- 問2 -->
<?php
$sum = 0; // 合計の変数を初期化

for ($i = 1; $i <= 100; $i++) { // 1から100までループさせる
    if ($i % 2 == 0) { // 偶数をピックアップ
        $sum += $i; // 偶数だけを合計に加算する
    }
}

echo "偶数の合計は: " . $sum; // 結果の呼び出し
?>


<!-- 問3 -->
<?php
for ($i = 1; $i <= 100; $i++) { // 1から100までループさせる
    if ($i % 15 == 0) { // 15の倍数をピックアップ(point:初めに3と5の両倍数である15の倍数から指定する)
        echo "FizzBuzz\n";; // 15の倍数をFizzBuzzと呼び出し
    } elseif ($i % 3 == 0) { // 3の倍数をピックアップ
        echo "Fizz\n"; // 3の倍数をFizzと呼び出し
    } elseif ($i % 5 == 0) { // 5の倍数をピックアップ
        echo "Buzz\n"; // 5の倍数をBuzzと呼び出し
    } else {
        echo $i . "\n"; // それ以外を呼び出し
    }
}
?>


<!-- 問4 -->
<?php
$numbers = [11, 22, 33, 44, -55]; // 任意の5つの数字を用意

$max = $numbers[0]; // 最初の値を仮の最大値として設定

for ($i = 1; $i < count($numbers); $i++) { // 配列をループして最大値を探す
    if ($numbers[$i] > $max) { 
        $max = $numbers[$i]; // 設定した最大値よりもnumberが大きければ、その数値を最大値と定義する
    }
}

echo "最も大きい数字は: " . $max; // 結果の呼び出し
?>


<!-- 問5 -->
<?php
function isPalindrome($input) { // 1. 全角ひらがなをカタカナに変換（mb_convert_kanaの"c"オプションで変換）
    $normalized = mb_convert_kana($input, "c", "UTF-8");

    $normalized = mb_strtolower($normalized, "UTF-8"); // 2. 大文字を小文字に（英語用）

    $normalized = preg_replace('/[^\p{L}]/u', '', $normalized); // 3. 記号・スペース・句読点などを除去（Unicodeの正規表現）
    // 文字だけを残す

    $length = mb_strlen($normalized); // 4. 回文チェック（左右から比較）
    for ($i = 0; $i < $length / 2; $i++) {
        if (mb_substr($normalized, $i, 1) !== mb_substr($normalized, $length - 1 - $i, 1)) {
            return false;
        }
    }
    return true;
}

$testWords = [
    "よるわさかいまさとさまいかさわるよ",        // ひらがな
    "タケヤブヤケタ",        // カタカナ
    "Level",                // 英語（大文字小文字混在）
    "A man, a plan, a canal: Panama", // 英語（スペース・記号含む）
    "こんにちは"              // 回文じゃない日本語
];

foreach ($testWords as $word) {
    if (isPalindrome($word)) {
        echo "「{$word}」は回文です。\n";
    } else {
        echo "「{$word}」は回文ではありません。\n";
    }
}
?>

