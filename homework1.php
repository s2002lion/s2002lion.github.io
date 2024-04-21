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
    $sum = 0;
    $prod = 1;

    echo "<p>1부터 {$n}까지의 숫자:<br>";
    for ($i = 1; $i <= $n; $i++) {
        echo $i . " ";
        $sum += $i;
        $prod *= $i;
    }

    echo "<p>1 + ... + {$n} = {$sum}<br>";
    echo "1 * ... * {$n} = {$prod}</p>";
  ?>
</body>
</html>