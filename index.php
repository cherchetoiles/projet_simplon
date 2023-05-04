<?php
include('controller/homecontroller.php');

switch($_GET['action']){
    case "signin_treat":
        signin_treat();
        break;
    case "signup_treat":
        signup_treat();
        break;
    case "signin":
        signin();
        break;
    case "signup":
        signup();
        break;
    case "addThemeTreat":
        addThemeTreat();
        break;
    case "addTheme":
        addTheme();
        break;
    default:
        exit;
}
?>