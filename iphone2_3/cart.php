<?php
session_start();

if (!empty($_POST)) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $_SESSION['cart'][$code][] = [
        'code' => $code,
        'name' => $name,
        'price' => $price
    ];
}
// Trở về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>