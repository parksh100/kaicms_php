<?php
header('Content-Type: application/json'); // ensure that PHP sends a JSON header

// database connection settings
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "kaicms";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die(json_encode(array("result" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

// get data from form
$email = $_POST['login_email'];
$password = $_POST['login_pwd'];

// protect against SQL injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// query database for user
$sql = "SELECT * FROM user WHERE user_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // verify password
        if (password_verify($password, $row["user_pwd"])) {
            // Password is correct, so start a new session
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["user_id"];
            $_SESSION["email"] = $email;   
            $_SESSION["role"] = $row["user_role"];
            $_SESSION["name"] = $row["user_name"];   

            echo json_encode(array("result" => "login_success"));
        } else {
            // Display an error message if password is not valid
            echo json_encode(array("result" => "login_fail", "message" => "The password you entered was not valid."));
        }
    }
} else {
    echo json_encode(array("result" => "login_fail", "message" => "No account found with that email."));
}
$conn->close();
?>