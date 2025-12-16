<?php
session_start();
include 'connection.php';  // đã có sẵn kết nối $conn từ file connection.php

// Lấy dữ liệu từ form
$name = $_POST['user'];
$pass = $_POST['password'];

// Kiểm tra dữ liệu rỗng (phòng lỗi)
if (empty($name) || empty($pass)) {
    header('Location: login.php');
    exit();
}

// Truy vấn kiểm tra người dùng trong bảng users
$sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pass'";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả
if ($result && mysqli_num_rows($result) == 1) {
    // Lưu username vào session
    $_SESSION['username'] = $name;
    header('Location: home.php');
    exit();
} else {
    // Sai tên hoặc mật khẩu → quay lại trang login
    header('Location: login.php');
    exit();
}
?>
