<?php
include('controller/homecontroller.php');

switch($_GET['action']){
    case "signin_treat":
        signin_treat();
        break;
    case "signup_treat":
        signup_treat();
        break;
    default:
        header("location:view/index.php");
}
?>