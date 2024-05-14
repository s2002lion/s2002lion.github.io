<!DOCTYPE html>
<html>
<head>
    <title>고객 표 입력</title>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="customer_name">고객 성명:</label>
    <input type="text" id="customer_name" name="customer_name"><br><br>
    
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>구분</th>
                <th>어린이</th>
                <th>어른</th>
                <th>비고</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>입장</td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">7000</div>
                        <div style="flex: 1;">
                            <select name="child_entrance1">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">10000</div>
                        <div style="flex: 1;">
                            <select name="adult_entrance1">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>입장</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Big3</td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">12000</div>
                        <div style="flex: 1;">
                            <select name="child_entrance2">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">16000</div>
                        <div style="flex: 1;">
                            <select name="adult_entrance2">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>입장+놀이 3종</td>
            </tr>
            <tr>
                <td>3</td>
                <td>자유이용권</td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">21000</div>
                        <div style="flex: 1;">
                            <select name="child_entrance3">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">26000</div>
                        <div style="flex: 1;">
                            <select name="adult_entrance3">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>입장+놀이자유</td>
            </tr>
            <tr>
                <td>4</td>
                <td>연간이용권</td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">70000</div>
                        <div style="flex: 1;">
                            <select name="child_entrance4">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="display: flex;">
                        <div style="flex: 1;">90000</div>
                        <div style="flex: 1;">
                            <select name="adult_entrance4">
                                <?php for($i = 0; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>입장+놀이자유</td>
            </tr>
        </tbody>
    </table>

    <br>
    <input type="submit" value="제출">
</form>

<?php
// 데이터베이스 연결 정보
$servername = "localhost"; // MySQL 서버 주소
$username = "root"; // MySQL 사용자 이름
$password = ""; // MySQL 비밀번호
$dbname = "ticket_system"; // 사용할 데이터베이스 이름

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 요청 처리
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST 데이터 받아오기
    $customer_name = $_POST['customer_name'];
    $child_entrance1 = $_POST['child_entrance1'];
    $adult_entrance1 = $_POST['adult_entrance1'];
    $child_entrance2 = $_POST['child_entrance2'];
    $adult_entrance2 = $_POST['adult_entrance2'];
    $child_entrance3 = $_POST['child_entrance3']; // 추가된 부분
    $adult_entrance3 = $_POST['adult_entrance3']; // 추가된 부분
    $child_entrance4 = $_POST['child_entrance4']; // 추가된 부분
    $adult_entrance4 = $_POST['adult_entrance4']; // 추가된 부분

 // 전체 리스트 뷰 출력
echo "<table border='1'>";
echo "<tr><th colspan='4'>" . date("Y년 m월 d일 H시 i분") . "</th></tr>";
echo "<tr><th colspan='4'>" . $customer_name . " 고객님 감사합니다</th></tr>";

// 티켓 종류 및 수량 배열 선언
$tickets = array();

// 어린이 입장 수와 어른 입장 수 계산
$total_child_entrance = $child_entrance1 + $child_entrance2 + $child_entrance3 + $child_entrance4;
$total_adult_entrance = $adult_entrance1 + $adult_entrance2 + $adult_entrance3 + $adult_entrance4;

// 티켓 종류 및 수량 배열에 추가
if ($child_entrance1 > 0) {
    $tickets["어린이 입장권"] = $child_entrance1;
}
if ($child_entrance2 > 0) {
    $tickets["어린이 Big3"] = $child_entrance2;
}
if ($child_entrance3 > 0) {
    $tickets["어린이 자유 이용권"] = $child_entrance3;
}
if ($child_entrance4 > 0) {
    $tickets["어린이 연간 이용권"] = $child_entrance4;
}
if ($adult_entrance1 > 0) {
    $tickets["어른 입장권"] = $adult_entrance1;
}
if ($adult_entrance2 > 0) {
    $tickets["어른 Big3"] = $adult_entrance2;
}
if ($adult_entrance3 > 0) {
    $tickets["어른 자유 이용권"] = $adult_entrance3;
}
if ($adult_entrance4 > 0) {
    $tickets["어른 연간 이용권"] = $adult_entrance4;
}

// 티켓 종류 및 수량 출력
echo "<tr><th colspan='4'>";

foreach ($tickets as $ticket => $quantity) {
    echo $ticket . " " . $quantity . "매, ";
}

// 총 입장료 계산
$total_price = $child_entrance1 * 7000 + $adult_entrance1 * 10000 +
    $child_entrance2 * 12000 + $adult_entrance2 * 16000 +
    $child_entrance3 * 21000 + $adult_entrance3 * 26000 +
    $child_entrance4 * 70000 + $adult_entrance4 * 90000;
echo "총 입장료 " . $total_price . "원</th></tr>";

    // 쿼리 작성하여 데이터베이스에 삽입
    $sql1 = "INSERT INTO tickets (customer_name, child_entrance, adult_entrance) 
            VALUES ('$customer_name', '$child_entrance1', '$adult_entrance1')";
    $sql2 = "INSERT INTO tickets (customer_name, child_entrance, adult_entrance) 
            VALUES ('$customer_name', '$child_entrance2', '$adult_entrance2')";
    $sql3 = "INSERT INTO tickets (customer_name, child_entrance, adult_entrance) 
            VALUES ('$customer_name', '$child_entrance3', '$adult_entrance3')";
    $sql4 = "INSERT INTO tickets (customer_name, child_entrance, adult_entrance) 
            VALUES ('$customer_name', '$child_entrance4', '$adult_entrance4')";

    // 쿼리 실행
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE &&
        $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) {
        echo "Record inserted successfully";
        
        // 삽입 완료 후에 테이블의 모든 레코드 삭제
        $sql_delete = "DELETE FROM tickets";
        if ($conn->query($sql_delete) === TRUE) {
            echo "All records deleted successfully";
        } else {
            echo "Error deleting records: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}

// 데이터베이스 연결 종료
$conn->close();
?>

</body>
</html>