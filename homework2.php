<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homework</title>
</head>
<body>
<?php
$n = 30;
$data = array();

// n개의 정수 랜덤 넘버 생성
for ($i = 0; $i < $n; $i++) {
    $data[$i] = rand(10, 100); // 10 이상 100 이하의 랜덤 정수 생성
}

// 생성된 결과 출력
echo "생성된 결과: ";
foreach ($data as $value) {
    echo $value . " ";
}

// 올림차순으로 정렬
sort($data);

// 소팅된 결과 출력
echo "<br>올림차순으로 정렬된 결과: ";
foreach ($data as $value) {
    echo $value . " ";
}
?>
</body>
</html>