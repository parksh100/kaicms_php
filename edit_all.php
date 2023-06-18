<?php
//  include "header.php";

// 수정할 회원의 정보를 가져온다.
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];  
    echo "수정할 user_id: ". $user_id;
}else{
    echo "수정할 user_id가 없습니다.";
}


$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$role = $_POST['role'];

$ohsms_iaf_code = $_POST['ohsms_iaf_code'];
$ohsms_iaf_code_string = implode(",", $ohsms_iaf_code);

$qms_iaf_code = $_POST['qms_iaf_code'];
$qms_iaf_code_string = implode(",", $qms_iaf_code);

$ems_iaf_code = $_POST['ems_iaf_code'];
$ems_iaf_code_string = implode(",", $ems_iaf_code);

echo $name. "<br>";
echo $email. "<br>";
echo $pwd. "<br>";
echo $role. "<br>";


print_r($ohsms_iaf_code_string). "<br>"; // print_r는 줄바꿈이 되지 않음.
echo "<br>";
print_r($qms_iaf_code_string). "<br>";
echo "<br>";
print_r($ems_iaf_code_string). "<br>";
echo "<br>";


// db connection
$servername = "localhost";
$username = "root";
$password ="root";
$dbname = "kaicms";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "UPDATE user SET user_name = '$name', user_email = '$email', user_pwd = '$pwd', user_role = '$role', user_ohsms_iaf_code = '$ohsms_iaf_code_string', user_qms_iaf_code = '$qms_iaf_code_string', user_ems_iaf_code = '$ems_iaf_code_string' WHERE user_id = $user_id";

if($conn->query($sql) === TRUE) {
    echo "<script>
    alert('회원정보 수정이 완료되었습니다.');
    location.href='list_user.php';
    </script>";
} else {
    echo "Error updating record: " . $conn->error;
}

// PHP에서 -> 연산자는 객체의 메서드(method)를 호출하거나 속성(property)에 접근할 때 사용하는 연산자입니다.
// 예를 들어, $conn->query($sql)에서 $conn은 객체, query()는 $conn 객체의 메서드를 나타냅니다. $conn->query($sql)는 $conn 객체의 query() 메서드를 호출하고, 이 메서드에 $sql 변수를 인자로 전달하라는 의미입니다.
// 다시 말해, $conn->query($sql)는 $conn이라는 객체에 정의된 query 함수를 호출하되, 이때 SQL문을 문자열로 담고 있는 $sql 변수를 인자로 넘기는 것입니다.
// 객체 지향 프로그래밍에서 -> 연산자는 매우 중요한 역할을 합니다. 이 연산자를 통해 객체의 메서드를 호출하고 속성에 접근할 수 있습니다.

$conn->close();


?>