<?php
include('controller/homecontroller.php');

switch($_GET['action']){
    case "signin_treat":
        signin_treat();
        break;

    default:
        signin();
}
?>