<?php

session_start();


if(isset($_SESSION['user_session'])){
    unset($_SESSION['user_session']);
    session_destroy();
}
header('location:index.php');
exit();

