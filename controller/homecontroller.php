<?php
session_start();
include('config/Connect_bdd.php');

include('repository/User_repo.php');

include('model/User.php');


function signin_treat(){
    var_dump($_POST);
    if (empty($_POST['your_name']) and empty($_POST['your_pass'])){
        header("location: index.php");
    }
    $repo = new UserRepository();
    $tmpUser=$repo->getUserByEmail($_POST['your_email']);
    $user=new user();
    if ($tmpUser){
        $user->createUserFromQuery($tmpUser);
        $isOk=$user->verifUserToSignin($_POST['your_pass']);
        if ($isOk=="True"){
            if ($_POST['remember_me']=="on"){
            setcookie("simplon_name",$_POST['your_email'],time()+60*60*24*30,"/",httponly:true);
            }
        $user->connectUser();
        header("location:index.php");    
        }
        else{
            echo $isOk;
            //header("location:index.php?action=signin&error".$isOk);
        }
    }
    
    
}

function signup_treat(){
    var_dump($_POST);
    $repo = new UserRepository();
    $tmpUser=new User();
    $tmpUser->createUserToSignup($_POST['email'],$_POST['name'],$_POST['surname'],$_POST['pass']);
    $isOk=$tmpUser->verifUserToSignup($_POST['re_pass'],$repo,$_POST['agree-term']);
    var_dump($isOk);
    if ($isOk=="True"){
        $tmpUser->cryptUserPassword();
        $repo->insertUserIntoBdd($tmpUser);
    }
    else{
        header("location:index.php?action=signup&error=".$isOk);
    }
}

function recurBind($req,array $params,$i){
    if ($i!=0){
        $var=end($params);
        $req->bindParam($i,$var);
        $i-=1;
        recurBind($req,array_slice($params,0,$i),$i);
    }
}

function kodex_random_string($length=20){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<$length; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}

?>