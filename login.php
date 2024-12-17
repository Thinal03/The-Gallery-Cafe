<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO signin (username, password) VALUES ('$username', '$password')";
    $sql = "SELECT id, role FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userid'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: Admin/adminpanel.html");
        } elseif ($row['role'] == 'customer') {
            header("Location: home.html");
        } elseif ($row['role'] == 'staff') {
            header("Location: Operationalstaff/operationalstaffpanel.html");
        }
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
