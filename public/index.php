<?php
require_once __DIR__ . '/../src/bootstrap.php';
if (isset($_GET['ind']) && $_GET['ind'] >= 0) {
    array_splice($_SESSION['giohang'], $_GET['ind'], 1);
}
if (isset($_POST['btn-add-cart']) && ($_POST['btn-add-cart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $soluong = $_POST['soluong'];
    $price = $_POST['price'];
    $trung = 0;
    $sp = ["id" => $id, "img" => $img, "name" => $name, "price" => $price, "soluong" => $soluong];
    $_SESSION['giohang'][] = $sp;
}
elseif (isset($_POST['pay_products'])) {
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $currentTime =  new DateTime();
    $currentTime = $currentTime->format("Y-m-d H:i:s");
    $user = new APP\user($pdo);
    $user = $user->user_theo_name($_SESSION['user_name']);
    $HD = new APP\hoa_don($pdo);
    $result = $HD->add_HD($user->ID,$currentTime,$_SESSION['giohang'],$address,$phone);
    if ($result) {
        echo "<script> alert('Bạn đã đặc hàng thành công.');</script>";
    } else {
        echo "<script> alert('Đặt hàng không thành công.');</script>";
    }
    unset($_SESSION['giohang']);

if (isset($_POST['logout'])) {
    // Hủy bỏ thông tin phiên làm việc
    session_unset();
    session_destroy();

    header("location: login.php"); 
    exit();
}
}
include_once __DIR__ . "/../src/model/getcatelog.php";
$book = new APP\book($pdo);
$data = get_catelog();
if (!isset($_POST['dm'])) {
    $activeCategory = '';
    if (isset($_POST['popular'])) {
        $books = $book->SORT_popular();
    } elseif (isset($_POST['new'])) {
        $books = $book->SORT_new();
    } elseif (isset($_POST['hot'])) {
        $books = $book->SORT_hot();
    } elseif (isset($_POST['sort_desc'])) {
        $books = $book->SORT_price_DESC();
    } elseif (isset($_POST['sort'])) {
        $books = $book->SORT_price();
    } elseif (isset($_POST['search'])) {
        $books = $book->search_by_name($_POST['search']);
    } else {
        $books = $book->getAllProducts();
    }
} else {
    $activeCategory = $_POST['dm'];
    $books = $book->getProductsbyDM($activeCategory);
}
if (isset($_POST['viewcart'])) {
    if (isset($_POST['del_cart'])) {
        $stt = $_POST['stt'];
        array_splice($_SESSION['giohang'], $stt, 1);
    }
    if (!isset($_SESSION['user_name'])) {
        require_once __DIR__ . '/../src/templates/headerlogout.php';
    } else {
        $user_name = $_SESSION['user_name'];
        require_once __DIR__ . '/../src/templates/headerlogin.php';
    }
    require_once __DIR__ . '/../src/templates/viewcart.php';
} elseif (isset($_POST['pay'])) {
    $user = new APP\user($pdo);
    $user = $user->user_theo_name($_SESSION['user_name']);
    require_once __DIR__ . '/../src/templates/pay.php';
}
else {
    $dm = showDm($data, $activeCategory);
    if (!isset($_SESSION['user_name'])) {
        require_once __DIR__ . '/../src/templates/headerlogout.php';
    } else {
        $user_name = $_SESSION['user_name'];
        require_once __DIR__ . '/../src/templates/headerlogin.php';
    }
    require_once __DIR__ . "/../src/model/phan_trang.php";
    require_once __DIR__ . "/../src/templates/content.php";
    require_once __DIR__ . '/../src/templates/footer.php';
}
