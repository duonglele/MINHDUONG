<?php
session_start();
include 'connection.php'; // Kết nối database

// Kiểm tra nếu chưa đăng nhập thì quay về login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

// Lấy thông tin từ database
$sql = "SELECT student_id, country, date_of_birth FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$student_id = $country = $dob = "";
if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id'];
    $country = $row['country'];
    $dob = $row['date_of_birth'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            background: url('Image.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        .logout {
            position: absolute;
            top: 20px;
            right: 40px;
        }
        .logout a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            background-color: rgba(0,0,0,0.4);
            border-radius: 5px;
        }
        .logout a:hover {
            background-color: rgba(255,255,255,0.2);
        }
        .info-box {
            background-color: rgba(0,0,0,0.5);
            display: inline-block;
            padding: 40px 60px;
            border-radius: 15px;
            margin-top: 150px;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px black;
        }
        h2 {
            font-size: 24px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="logout">
        <a href="logout.php">LOGOUT</a>
    </div>

    <div class="info-box">
        <h1>WELCOME, <?php echo strtoupper($username); ?>!</h1>

        <?php if (!empty($student_id)): ?>
            <h2>Student ID: <?php echo htmlspecialchars($student_id); ?></h2>
        <?php endif; ?>

        <?php if (!empty($country)): ?>
            <h2>Country: <?php echo htmlspecialchars($country); ?></h2>
        <?php endif; ?>

        <?php if (!empty($dob)): ?>
            <h2>Date of Birth: <?php echo htmlspecialchars($dob); ?></h2>
        <?php endif; ?>
    </div>
</body>
</html>
