<?php
require 'connsql.php';
$conn = connection();

function addpd($product, $price)
{
    global $conn;
    $sql = "insert into products (product, price) values ('$product',$price)";
    if ($conn->query($sql)) {
        echo 'thêm thành công: ' . $product;
        return;
    }
    echo 'có lỗi add';
}

function update($id, $product, $price)
{
    global $conn;
    $sql = "update products set product = '$product', price =$price where id=$id";
    if ($conn->query($sql)) {
        echo 'update thành công:' . $product . ' ID: ' . $id . '<br>' . '<br>' . 'Giá: ' . $price;
        return;
    }
    echo 'update thất bại';
}

function delpd($id)
{
    global $conn;
    $sql = "delete from products where id=$id";
    if ($conn->query($sql)) {
        echo 'xóa thành công:' . $id;
        return;
    }
    echo 'xóa thất bại';

}
function getpd()
{
    global $conn;
    $sql = "select * from products";
    $result = $conn->query($sql);
    $row = $result->fetch_all();
    return $row;
}

?>