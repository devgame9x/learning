<html>
<form action="" method="post">
    <h3>Thêm sản phẩm</h3><br>
    Tên sản phẩm <input type="text" name="product"> <br>
    Giá <input type="text" name="price"> <br>
    <input type="submit" name="addpd" value="add product">

</form>

<form action="" method="post">
    <h3>Update thông tin sản phầm</h3>
    id sản phẩm <input type="text" name="id"> <br>
    Tên sản phẩm <input type="text" name="product"> <br>
    Giá <input type="text" name="price"> <br>
    <input type="submit" name="updatepd" value="update">
</form>
<form action="" method="post">
    <h3>Update thông tin sản phầm</h3>
    id sản phẩm <input type="text" name="id"> <br>
    <input type="submit" name="delpd" value="Xóa sản phẩm">
</form>

<a href="index.php">Trở về trang chủ</a>

<?php
require 'productsql.php';
if (!empty($_POST['addpd'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    addpd($product, $price);
}
if (!empty($_POST['updatepd'])) {
    $id = $_POST['id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    update($id, $product, $price);
}
if (!empty($_POST['delpd'])) {
    $id = $_POST['id'];
    delpd($id);
}

?>
</html>