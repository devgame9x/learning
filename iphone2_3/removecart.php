<?php
session_start();

if (!empty($_POST)) {
    $id = $_POST['id'];
    $cart = $_SESSION['cart'];
    unset($cart[$id]);
    $_SESSION['cart'] = $cart;
}
// Trở về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>