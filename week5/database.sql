-- Tạo database
CREATE DATABASE IF NOT EXISTS user_registration;
USE user_registration;

-- Tạo bảng users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    country VARCHAR(50),
    date_of_birth DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- (Tuỳ chọn) Thêm vài dữ liệu mẫu
INSERT INTO users (student_id, username, password, country, date_of_birth)
VALUES 
('ST001', 'admin', '123456', 'Vietnam', '2000-01-01'),
('ST002', 'john', 'password', 'USA', '1998-07-12');
