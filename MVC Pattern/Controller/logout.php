<?php 
require_once('Model/include/config.php');
session_start();
require_once('Model/include/config.php');
if(isset($_SESSION['is_logged_in'])){
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['admin_data']);
    session_destroy();
}
header('Location: '.ROOT_URL.'Controller/login.php');

// header('Location:'.ROOT_URL.'login.php');