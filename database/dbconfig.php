<?php

$servername = 'localhost';
$dbuser = 'root';
$dbpassword = 'root';
$dbname = 'kaicms';


try {
    $db = new PDO("mysql:host={$servername};dbname={$dbname};charset=utf8", $dbuser, $dbpassword);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // PDO에서는 false로 설정해야 prepare에서 LIMIT 사용 가능
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); // PDO에서는 true로 설정해야 rowCount() 사용 가능
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 에러 출력 옵션 : 에러출력
    
   echo "DB연결 성공";
} catch (PDOException $e) {
    echo "DB연결 실패: " . $e->getMessage();
    // $e->getMessage() : PDOException 객체의 에러 메시지 출력
    // 에러메세지 중에 컴퓨터에서 거부했다는 에러는 db서버가 죽었다는 것임. db서버를 다시 살려야함.
}

?>