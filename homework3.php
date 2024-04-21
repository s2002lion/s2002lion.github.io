<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fibonacci Sequence</title>
</head>
<body>
<form method="POST">
    <label for="number">정수 n 입력 (1 이상 100 이하):</label>
    <input type="number" id="number" name="number" min="1" max="100">
    <input type="submit" value="확인">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST["number"];
    
    if (!empty($n) && is_numeric($n) && $n >= 1 && $n <= 100) {
        echo "<h2>Fibonacci Sequence (n = $n)</h2>";

        $fibonacci = array(1, 1);
        echo "<table border='1'><tr><th>i</th><th>fi</th><th>fi+1</th><th>fi+1/fi</th></tr>";

        // n개의 피보나치 수열과 앞과 뒤항의 비율 출력
        for ($i = 2; $i < $n; $i++) {
            $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
            $ratio = $fibonacci[$i] / $fibonacci[$i - 1];
            echo "<tr><td>$i</td><td>{$fibonacci[$i]}</td><td>{$fibonacci[$i - 1]}</td><td>$ratio</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>올바른 숫자를 입력하세요 (1 이상 100 이하).</p>";
    }
}
?>
</body>
</html>