<?php

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

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully" . "<br>";

// Prepare and bind the SQL statement using prepared statements
$sql = "INSERT INTO user (user_name, user_email, user_pwd, user_role, user_ohsms_iaf_code, user_qms_iaf_code, user_ems_iaf_code) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $name, $email, $pwd, $role, $ohsms_iaf_code_string, $qms_iaf_code_string, $ems_iaf_code_string);
$stmt->execute();

$stmt->close();
$conn->close();
echo "<script>
alert('회원가입이 완료되었습니다.');
location.href='list_user.php';
</script>"

?>