<?php

session_start();
ob_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/model/db_connect.php';
$pdo = connect_db();
