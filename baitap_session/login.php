<?php
session_start();
const FIX_USERNAME = 'customer';
const FIX_PASSWORD = '123456';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == FIX_USERNAME && $password == FIX_PASSWORD) {
        $_SESSION['username'] = $username;
    } else {
        $_SESSION['message'] = 'Tài khoản hoặc mật khẩu không đúng';
    }
} else {
    $_SESSION['message'] = 'Chưa nhập tài khoản hoặc mật khẩu';
}
// Trở về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);