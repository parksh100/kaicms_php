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
$password ="";
$dbname = "kaicms";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" . "<br>";

$sql = "INSERT INTO user (user_name, user_email, user_pwd, user_role, user_ohsms_iaf_code, user_qms_iaf_code, user_ems_iaf_code) VALUES ('$name', '$email', '$pwd', '$role', '$ohsms_iaf_code_string', '$qms_iaf_code_string', '$ems_iaf_code_string')";

mysqli_query($conn, $sql);

mysqli_close($conn);

echo "<script>
alert('회원가입이 완료되었습니다.');
location.href='index.php';
</script>"

?>