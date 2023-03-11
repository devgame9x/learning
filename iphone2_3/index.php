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
    require 'productsql.php';
    $messenger = '';
    ?>
    <a href="addproduct.php">thêm sản phẩm</a>
    <table border="1">
        <tr>
            <td>ID sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Đặt hàng</td>
        </tr>
        <?php
        foreach (getpd() as $product) {
            $id = $product[0];
            $name = "$product[1]";
            $price = $product[2];

            ?>
            <tr>
                <td>
                    <?= $id ?>
                </td>
                <td>
                    <?= $name ?>
                </td>
                <td>
                    <?= $price ?>
                </td>
                <td>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="product" value="<?= $name ?>">
                        <input type="hidden" name="price" value="<?= $price ?>">
                        <button type="submit">Đặt hàng</button>
                    </form>

                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php
    if (!empty($_SESSION['messenger'])) {
        $messenger = $_SESSION['messenger'];
        unset($_SESSION['messenger']);
    }
    if (empty($_SESSION['username'])) {
        ?>
        <form action="login.php" method="post" class="login">
            <div>
                <?= $messenger ?>
            </div>
            <div>
                <input type="text" name="username" placeholder="Nhập user: customer">
            </div>
            <div>
                <input type="password" name="password" placeholder="Nhập pass: 123456">
            </div>

            <button type="submit" name="login">Đăng nhập</button>
            <!-- <button type="submit" name="creatuser">Tạo tài khoản</button> -->
        </form>
    <?php
    } else {
        ?>
        <h2>Xin chào:
            <?= $_SESSION['username'] ?>
        </h2><br>
        <h2>Đơn hàng đã đặt</h2>
        <table border="1">
            <tr>
                <td>ID sản phẩm</td>
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
                    <td>
                        <?= $cart[0]['id'] ?>
                    </td>
                    <td>
                        <?= $cart[0]['name'] ?>
                    </td>
                    <td>
                        <?= $number ?>
                    </td>
                    <td>
                        <?= $cart[0]['price'] ?>
                    </td>
                    <td>
                        <?= $totalPrice ?>
                    </td>
                    <td>
                        <form action="removecart.php" method="post">
                            <input type="hidden" name="id" value="<?= $cart[0]['id'] ?>">
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