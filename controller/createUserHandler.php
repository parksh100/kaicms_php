<?php
// createUserView.php에서 입력받은 정보를 DB에 저장하는 코드
$name = $_POST['name'];
echo $name. "<br>";
$email = $_POST['email'];
echo $email. "<br>";
$password = $_POST['pwd'];
echo $password. "<br>";
$role = $_POST['role'];
echo $role. "<br>";
$qms_iaf_code = $_POST['qms_iaf_code'];
print_r($qms_iaf_code);
echo "<br>";
$ems_iaf_code = $_POST['ems_iaf_code'];
print_r($ems_iaf_code);
echo "<br>";
$ohsms_iaf_code = $_POST['ohsms_iaf_code'];
print_r($ohsms_iaf_code);
echo "<br>";



// DB에 저장하는 코드
$servername = 'localhost';
$dbuser = 'root';
$dbpassword = 'root';
$dbname = 'kaicms';

// Create connection with exception handling
$conn = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Use real escape string function for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pwd']);
$role = mysqli_real_escape_string($conn, $_POST['role']);

// Convert checkbox values to JSON and escape string
$qms_iaf_code = mysqli_real_escape_string($conn, json_encode($_POST['qms_iaf_code']));
$ems_iaf_code = mysqli_real_escape_string($conn, json_encode($_POST['ems_iaf_code']));
$ohsms_iaf_code = mysqli_real_escape_string($conn, json_encode($_POST['ohsms_iaf_code']));

// check for email duplication
$sql = "SELECT * FROM user WHERE user_email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // echo "Email already exists";
echo "<script>alert('이메일이 이미 존재합니다');history.back();</script>";
   exit();
}

// Password hashing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL with parameters
$sql = "INSERT INTO user (user_name, user_email, user_pwd, user_role, user_qms_iaf_code, user_ems_iaf_code, user_ohsms_iaf_code) VALUES ('$name', '$email', '$hashed_password', '$role', '$qms_iaf_code', '$ems_iaf_code', '$ohsms_iaf_code')";

// Try executing this query
try {
    mysqli_query($conn, $sql);
    echo "New records created successfully";
    header("Location: ../index.php");
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Close connection
mysqli_close($conn);


?>