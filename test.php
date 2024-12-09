<?php

use Symfony\Component\Dotenv\Dotenv;

// Nạp autoload của Composer
require __DIR__ . '/../vendor/autoload.php'; 

// Tạo đối tượng Dotenv và nạp file .env trong cùng thư mục
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env'); // Sửa lại đường dẫn ở đây

// Kiểm tra giá trị của MYSQL_HOST từ .env
echo 'MYSQL_HOST: ' . $_ENV['MYSQL_HOST']; // Hoặc sử dụng getenv('MYSQL_HOST');
var_dump($_ENV);