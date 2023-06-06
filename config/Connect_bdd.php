<?php

class Connect_bdd{
    public $bdd;

    public function __construct(){
        $user = "root";
<<<<<<< HEAD
        $pass = "";
=======
        // $pass = "";
>>>>>>> c92c475a8f61523fa1dcf64599591755a3148176
        $pass = "root";
        $host = "localhost";
        $db = "simplonsite";
        $this->bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
?>