<?php

class Connect_bdd{
    public $bdd;

    public function __construct(){
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "simplonsite";
        $this->bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
?>