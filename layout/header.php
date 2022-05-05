<!DOCTYPE html>
<html lang="en">
<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Poman</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <div class="container">
                <section class="logo">
                <div>
                    <a href=""><img src="https://images.vexels.com/media/users/3/185043/isolated/preview/73e23da62bec312e581f9c6980f9d568-watch-accessory-traditional-illustration.png" alt="" style="width:220px; padding: 0px 55px; margin:right;"></a>
                    <h1 style="text-align: center; color:black; font-size:28px;">Watch Store</h1>
                </div>
                </section>
                <nav>
                    <ul style="margin-top: 90px;">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li class="nav-cha">
                            <a href="thucdon.php?page=thucdon">Thương hiệu</a>
                            <ul class="nav-con">
                                <?php
                                    $sql="SELECT * FROM category";
                                    $result=executeResult($sql);
                                    foreach($result as $item){
                                        echo '<li><a href="thucdon.php?id_category=' . $item['id'] . '">'.$item['name'].'</a></li>';
                                    }
                                ?>
                                <!-- <li><a href="thucdon.php?page=trasua">Trà sữa</a></li>
                                <li><a href="thucdon.php?page=monannhe">Món ăn nhẹ</a></li>
                                <li><a href="thucdon.php?page=banhmi">Bánh mì</a></li>
                                <li><a href="thucdon.php?page=caphe">Cà phê</a></li> -->
                            </ul>
                        </li>
                        <li><a href="about.php">Về chúng tôi</a></li>
                        <li><a href="lienhe.php">Liên hệ</a></li>
                    </ul>
                </nav>
                <section class="menu-right">
                    <div class="cart">
                        <a href="cart.php"><img src="images/icon/cart.svg" alt=""></a>
                        <?php
                        $cart = [];
                        if (isset($_COOKIE['cart'])) {
                            $json = $_COOKIE['cart'];
                            $cart = json_decode($json, true);
                        }
                        $count = 0;
                        foreach ($cart as $item) {
                            $count += $item['num']; // đếm tổng số item
                        }
                        ?>
                        <span><?= $count ?></span>
                        <!-- <div class="history">
                            <a href="history.php"><i class="fas fa-history" style="font-size: 14px;"></i>Lịch sử</a>
                        </div> -->
                    </div>
                    <div class="login">
                        <?php
                        if (isset($_COOKIE['username'])) {
                            $username=$_COOKIE['username'];
                            if ($username == 'Admin'|| $username == 'admin1010') {
                                echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                                <div class="logout">
                                    <a href="admin/"><i class="fas fa-user-edit"></i>Admin</a> <br>
                                    <a href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                                </div>';
                            }
                            else{
                                echo '<a style="color:black;" href="">' . $_COOKIE['username'] . '</a>
                            <div class="logout">
                                <a href="login/changePass.php"><i ></i>Đổi mật khẩu</a>
                                <a href="login/logout.php"><i ></i>Đăng xuất</a>
                                    
                            </div>
                            ';
                            }
                        } 
                        else {
                            echo '<a href="login/login.php"">Đăng nhập</a>';
                        }

                        ?>
                    </div>
                </section>
            </div>
        </header>