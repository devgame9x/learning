<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>Đặt hàng</title>
</head>
<body>
<?php
    session_start();
    $messenger = '';
    $products = [
        [
            'code' => 'ip_13',
            'name' => 'Iphone 13',
            'price' => 140000
        ],
        [
            'code' => 'ip_13_pro',
            'name' => 'Iphone 13 pro',
            'price' => 180000
        ],
        [
            'code' => 'ip_13_pro_max',
            'name' => 'Iphone 13 pro max',
            'price' => 320000
        ],
        [
            'code' => 'ip_14',
            'name' => 'Iphone 14',
            'price' => 170000
        ],
    ];
    ?>
    <table border="1">
        <tr>
            <td>Tên sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Đặt hàng</td>
        </tr>
        <?php 
            foreach ($products as $product) {
        ?>
        <tr>
            <td><?=$product['name']?></td>
            <td><?=$product['price']?></td>
            <td>
                <form action="cart.php" method="post">
                    <input type="hidden" name="code" value="<?=$product['code']?>">
                    <input type="hidden" name="name" value="<?=$product['name']?>">
                    <input type="hidden" name="price" value="<?=$product['price']?>">
                    <button type="submit">Đặt hàng</button>
                </form>
                
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <?php
    if(!empty($_SESSION['messenger'])) {
        $messenger = $_SESSION['messenger'];
        unset($_SESSION['messenger']);
    }
    if (empty($_SESSION['username'])) {
?>
    <form action="login.php" method="post" class="login">
        <div><?= $messenger?></div>
        <div>
            <input type="text" name="username" placeholder="Nhập user: customer">
        </div>
        <div>
            <input type="password" name="password" placeholder="Nhập pass: 123456">
        </div>
        
        <button type="submit" class="loginbtn">Đăng nhập</button>
    </form>
<?php 
    } else {
?>
    <h2>Xin chào: <?= $_SESSION['username']?></h2><br>
    <h2>Đơn hàng đã đặt</h2>
    <table border="1">
        <tr>
            <td>Tên sản phẩm</td>
            <td>Số lượng</td>
            <td>Đơn giá</td>
            <td>Tổng giá</td>
            <td>Xoá</td>
        </tr>
        <?php 
            $carts = [];
            if (!empty($_SESSION['cart'])) {
                $carts = $_SESSION['cart'];
            }
            
            foreach ($carts as $cart) {
                $number = count($cart);
                $totalPrice = $number * $cart[0]['price'];
        ?>
        <tr>
            <td><?=$cart[0]['name']?></td>
            <td><?=$number?></td>
            <td><?=$cart[0]['price']?></td>
            <td><?=$totalPrice?></td>
            <td>
                <form action="removecart.php" method="post">
                    <input type="hidden" name="code" value="<?=$cart[0]['code']?>">
                    <button type="submit">Xoá hàng</button>
                </form>
                
            </td>
        </tr>
        <?php
            }
        ?>
        
    </table>
    <br>
    <span>
        <form action="logout.php" method="post">
            <button type="submit">Đăng xuất</button>
        </form>
    </span>
<?php
    }
?>
</body>
</html>