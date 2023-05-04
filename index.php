<?php
include("controller/homecontroller.php");
switch($_GET['action']){
    case "addThemeTreat":
        addThemeTreat();
        break;
    default:
        include("view/index.php");
}

?>