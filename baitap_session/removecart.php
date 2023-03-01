<?php
session_start();

if (!empty($_POST)) {
    $code = $_POST['code'];
    $cart = $_SESSION['cart'];
    unset($cart[$code]);
    $_SESSION['cart'] = $cart;
}
// Trở về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);