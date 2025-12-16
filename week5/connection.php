<?php
$servername = "localhost";
$username = "root";     // tài khoản mặc định Laragon
$password = "";         // mật khẩu trống
$database = "user_registration";

// Tạo kết nối
  $conn = mysqli_connect("localhost", "root", "", "login_demo", "3307") or die(mysqli_connect_error());
// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
