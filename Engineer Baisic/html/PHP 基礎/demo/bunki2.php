<?php
  // 分岐処理
  // 分岐処理は、if文を使うことで分けることができます
  // else ifは、AではないがBのような条件を指定できます
  // 例)90点以上ではないが80点以上の場合、A評価

  $score = 67;
  if ($score >=90){
    echo "S";
  } else if ($score >=80){
    echo "A";
  } else if ($score >=70){
    echo "B";
  } else if ($score >=60){
    echo "C";
  } else {
    echo "D";
  }
  
  echo "\n";

?>