<?php 
    require_once __DIR__ . '/../src/bootstrap.php';

    if(!isset($_SESSION['user_name'])){
        require_once __DIR__ . '/../src/templates/headerlogout.php';
        // require_once __DIR__ . '/../src/model/getproduct.php';
        // require_once __DIR__ . '/../src/model/getcatelog.php';
    }else{
        $user_name=$_SESSION['user_name'];
        require_once __DIR__ . '/../src/templates/headerlogin.php';
        // require_once __DIR__ . '/../src/model/getproduct.php';
        // require_once __DIR__ . '/../src/model/getcatelog.php';
    }
    