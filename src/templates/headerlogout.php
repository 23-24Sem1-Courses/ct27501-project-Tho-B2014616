<?php 
   require_once __DIR__ . '/../model/db_connect.php';
    
?>
<?php 
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>NLCS - TN Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Thư viện icon Fontawesome -->
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Css style -->
    <link rel="stylesheet" href="../public/assets/css/base.css">
    <link rel="stylesheet" href="../public/assets/css/main.css">
    <link rel="stylesheet" href="../public/assets/css/grid.css">
    <link rel="stylesheet" href="../public/assets/css/responsive.css">
    <link rel="stylesheet" href="../public/assets/css/cart.css">


</head>

<body>

    <div class="app">
        <header class="app__header">
            <div class="grid wide">
                <nav class="header__navbar hide-on-mobile-tablet">

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--separate header__navbar-item--has-qr">
                            Vào TN-Shop từ ứng dụng
                            <!--Header QR Code-->
                            <div class="header__qr">
                                <img src="../assets/img/QR_code.png" alt="QR_code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="https://play.google.com/store/books?hl=vi&gl=US" class="header__qr-link">
                                        <img src="../assets/img/GooglePlay.png" alt="Google GooglePlay"
                                            class="header__qr-download-img">
                                    </a>
                                    <a href="https://www.apple.com/app-store/" class="header__qr-link">
                                        <img src="../assets/img/Appstore.png" alt="Appstore"
                                            class="header__qr-download-img">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-pointer">Kết nối</span>
                            <a href="https://www.facebook.com/" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify">
                            <a href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i> Thông báo
                            </a>
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="../assets/img/onstask_img.webp" alt="Ảnh Onstack"
                                                class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">
                                                    On Task - Đúng Việc
                                                </span>
                                                <span class="header__notify-descriotion">
                                                    Bộ Não Chúng Ta Làm Việc Như Thế Nào?
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="../assets/img/bo_sgk10.jpg" alt="Ảnh SGK-10"
                                                class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">
                                                    Bộ Sách Giáo Khoa Lớp 10 Năm Học 2023-2024
                                                </span>
                                                <span class="header__notify-descriotion">
                                                    Hãy làm người đầu tiên viết nhận xét cho sản phẩm này
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="../assets/img/con-chim-xanh-biec-bay.jpg"
                                                alt="Ảnh  sách Con chim xanh" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">
                                                    Vừa ra mắt tác phẩm truyện dài “Con chim xanh biếc bay về” của nhà
                                                    văn Nguyễn Nhật Ánh.
                                                    <span class="header__notify-descriotion">
                                                        Hai ngày sau phát hành, Con chim xanh biếc bay về đã nằm trong
                                                        top sách ăn khách.
                                                    </span>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="" class="header__notify-footer-btn">
                                        Xem tất cả
                                    </a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="#" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-regular fa-circle-question"></i> Trợ giúp
                            </a>
                        </li>
                        <li
                            class="header__navbar-item header__navbar-item--strong js-register-btn header__navbar-item--separate">
                            <a href="../../public/login.php">Đăng ký</a> 
                        </li>
                        <li href="../../public/login.php"
                            class="header__navbar-item header__navbar-item--strong js-register-btn header__navbar-item--separate">
                            Đăng ký
                        </li>
                        <li class="header__navbar-item header__navbar-item--strong js-login-btn">Đăng nhập</li>
                    </ul>
                    

                </nav>

                <!-- Header-with-search -->

                <div class="header-with-search">
                    <!-- Header Mobile More Selection -->
                    <div class="header__mobile-selection">

                        <div class="header__mobile-bars js-barBtn">
                            <i class="header__mobile-bars-icon fa-solid fa-bars"></i>
                        </div>

                        <div class="header__mobile-selection-overlay"></div>


                        <div class="header__mobile-selection-wrap ">
                            <h2 class="header__mobile-selection-heading">Tất cả sản phẩm
                                <i class="fa-solid fa-xmark header__mobile-selection-close-icon js-closeBtn"></i>
                            </h2>
                            <ul class="header__mobile-selection-list">
                                <li class="header__mobile-selection-item">
                                    <a href="index.php?pg=textbook" class="header__mobile-selection__link">Sách giáo
                                        khoa
                                        <span class="header__mobile-selection-item-more">
                                            <i class=" header__mobile-angle-right-icon fa-solid fa-angle-right"></i>
                                        </span>
                                    </a>
                                </li>

                                <li class="header__mobile-selection-item">
                                    <a href="index.php?pg=science" class="header__mobile-selection__link">Sách khoa học
                                        <span class="header__mobile-selection-item-more">
                                            <i class=" header__mobile-angle-right-icon fa-solid fa-angle-right"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="header__mobile-selection-item">
                                    <a href="index.php?pg=novel" class="header__mobile-selection__link">Tiểu thuyết,
                                        truyện tranh
                                        <span class="header__mobile-selection-item-more">
                                            <i class=" header__mobile-angle-right-icon fa-solid fa-angle-right"></i>
                                        </span>
                                    </a>
                                </li>

                                <li class="header__mobile-selection-item">
                                    <a href="#" class="header__mobile-selection__link">Tin tức</a>
                                </li>
                                <li class="header__mobile-selection-item">
                                    <a href="#" class="header__mobile-selection__link">Liên hệ</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- End: Header Mobile More Selection -->

                    <label for="mobile-search-checkbox" class="header__mobile-search">
                        <i class="header__mobile-search-icon fas fa-search"></i>
                    </label>

                    <div class="header__logo hide-on-tablet">
                        <a href="index.php" class="header__logo-link">
                            <img src="../assets/img/logo.png" class="header__logo-img">

                            </img>
                        </a>
                    </div>

                    <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox">

                    <div class="header__search ">
                        <!-- hide-on-mobile -->
                        <div class="header__search-input-wrap">
                            <input type="text" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">


                            <!-- Search history -->
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="index.php?pg=sgk">Sách giáo khoa 10</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="index.php?pg=khoahoc">Sách khoa học</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="index.php?pg=tieuthuyet">Tiểu thuyết, truyện tranh</a>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <button class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </div>

                    <!-- Cart layout -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class=" header__cart-icon fas fa-shopping-cart"></i>
                            <span class="header__cart-notice">3</span>

                            <!-- No cart:  header_cart-list--no-cart -->
                            <div class="header__cart-list  ">
                            <img src="../assets/img/no_cart.png" alt="img Cart" class="header__cart-no-cart-img">
                                <span class="header__cart-list-no-cart-msg">
                                    <strong>Chưa có sản phẩm</strong>
                                </span>
                                <!-- <a class="header__cart-login-btn">login</a> -->
                                <a href="login.php" class="header__cart-login-btn btn btn--primary">Đăng nhập</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <ul class="header__sort-bar">
                <li class="header__sort-item">
                    <a href="" class="header__sort-link">Liên quan</a>
                </li>
                <li class="header__sort-item header__sort-item--active">
                    <a href="" class="header__sort-link">Mới nhất</a>
                </li>
                <li class="header__sort-item">
                    <a href="" class="header__sort-link">Bán chạy</a>
                </li>
                <li class="header__sort-item">
                    <a href="" class="header__sort-link">Giá</a>
                </li>
            </ul>

        </header>