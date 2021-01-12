<?php 
require_once('Model/include/config.php');
 session_start();
 if(!isset($_SESSION['is_logged_in'])){
   header('Location:'.ROOT_URL.'Controller/login.php');
 }