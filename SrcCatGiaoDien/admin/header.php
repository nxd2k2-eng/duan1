<?php
session_start();

// Kết nối database
require_once __DIR__ . "/config/database.php";
require_once __DIR__ . "/includes/functions.php";

// Kiểm tra đăng nhập (để dành cho sau)
// if (!isset($_SESSION['admin_logged_in'])) {
//     header('Location: login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Shop Giày</title>
    
    <?php require_once __DIR__ . "/components/styles.php"; ?>
</head>
<body class="bg-gray-50">
    <div class="admin-wrapper">