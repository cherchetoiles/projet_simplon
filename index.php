<?php
include('controller/homecontroller.php');

switch($_GET['action']){
    case "signin_treat":
        signin_treat();
        break;
    case "signup":
        signup();
        break;
    case "signup_treat":
        signup_treat();
        break;
    case "signin":
        signin();
        break;
    case "addThemeTreat":
        addThemeTreat();
        break;
    case "addTheme":
        addTheme();
        break;
    case "crud":
        crud();
        break;
    case "cours":
        cours();
        break;
    case "addVideo":
        include("view/ajoutVideoForm.php");
        break;
    case "addVideoTreat":
        addVideo();
    case "homepage":
        homepage();
        break;
    case "profil":
        profil();
        break;
    case "test":
        modaltest();
        break;
    default:
        signin();
}
?>