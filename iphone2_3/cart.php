<?php
session_start();

if (!empty($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $_SESSION['cart'][$id][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price
    ];
}
// Trở về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>