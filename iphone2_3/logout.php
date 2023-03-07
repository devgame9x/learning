<?php
session_start();
$_SESSION['username']="";
// Trở về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>