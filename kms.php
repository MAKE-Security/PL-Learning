# ctf 문제(php)

<?php

// flag 정의
define("FLAG", "FLAG{FLAG_HERE}");

// source 파라미터가 설정되어 있는지 확인하고 설정되어 있다면 소스 코드를 출력하고 종료
if (isset($_GET['source'])) {
    highlight_file(__FILE__);
    exit();
}

// input 파라미터가 설정되어 있는지 확인
if (isset($_GET['input'])) {
    // 입력값에서 작은따옴표와 큰따옴표를 제거하여 필터링
    $input = filter_var($_GET['input'], FILTER_SANITIZE_STRING);

    // 입력값의 길이 확인
    if (mb_strlen($input) > 50) {
        die("입력값이 너무 깁니다!");
    }

    // SQL 인젝션 키워드가 입력값에 포함되어 있는지 확인
    $sql_keywords = array("union", "select", "or", "and", "insert", "update", "delete", "truncate", "drop", "alter");
    foreach ($sql_keywords as $keyword) {
        if (mb_stripos($input, $keyword) !== false) {
            die("해킹하지 마세요!");
        }
    }

    // MySQL 데이터베이스에 연결
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "password";
    $db_name = "ctf";
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // 연결이 성공적으로 이루어졌는지 확인
    if (mysqli_connect_errno()) {
        die("MySQL 연결에 실패하였습니다: " . mysqli_connect_error());
    }

    // SQL 쿼리 준비
    $query = $mysqli->prepare("SELECT * FROM users WHERE username = ?");

    // 입력값을 SQL 쿼리의 파라미터와 연결
    $query->bind_param("s", $input);

    // SQL 쿼리 실행
    $result = $query->execute();

    // SQL 쿼리가 성공적으로 실행되었는지 확인
    if (!$result) {
        die("쿼리 실행 중 에러 발생: " . $mysqli->error);
    }

    // SQL 쿼리 결과로부터 반환된 레코드 수 확인
    $num_rows = $query->get_result()->num_rows;

    // 입력값으로 조회된 사용자가 있는지 확인
    if ($num_rows > 0) {
        // 결과 집합의 첫 번째 레코드 가져오기
        $row = $query->get_result()->fetch_assoc();
        // 사용자의 패스워드 해시 가져오기
        $password_hash = $row['password'];
        // 패스워드 검증
        if (password_verify($input, $password_hash)) {
            echo "Flag: " . FLAG;
        } else {
            die("잘못된 패스워드입니다!");
        }
    } else {
        die("$input 사용자를 찾을 수 없습니다.");
    }

    // SQL 쿼리와 관련된 자원 반환
    $query->close();

    // MySQL 연결 종료
    $mysqli->close();
}
else {
echo "input 파라미터를 제공해주세요!";
}

?>

### 해당 문제는 입력 받은 값이 SQL 인젝션 공격에 취약한지 확인하고, 취약하지 않다면 해당 값으로 데이터베이스에서 검색을 하여 결과를 반환함.
### 검색된 결과에 대해 입력값을 해시화하여 검증하고, 검증이 성공적으로 이루어진 경우 FLAG를 출력함.
### 이를 통해 SQL 인젝션 공격이 불가능하도록 방어하는 방법과 해시 함수를 사용하여 비밀번호를 보호하는 방법을 익힐 수 있음.
