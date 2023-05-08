<?php
include('config/Connect_bdd.php');

include('repository/User_repo.php');

include('model/User.php');

function signup(){
    require('view/signup.php');
}

function signin(){
    require('view/signin.php');
}

function signin_treat(){
    if (empty($_POST['your_name']) and empty($_POST['your_pass'])){
        header("location: index.php");
    }
    $repo = new UserRepository();
    $tmpUser=$repo->getUserByEmail($_POST['your_email']);
    $user=new user();
    if (!$tmpUser){
        header("location: index.php");
    }
    if (!$tmpUser->user_statut==1){
        header("location: index.php");
    }
    if (!password_verify($_POST['your_pass'],$tmpUser->user_password)){
        header('location: index.php');
    }
    if ($_POST['remember_me']=="on"){
        setcookie("simplon_name",$_POST['your_email'],time()+60*60*24*30,"/",httponly:true);
    }
        $user->createUserFromQuery($tmpUser);
        $user->connectUser();
        header("location:index.php");
}


function signup_treat(){
    $repo = new UserRepository();
    if (empty($_POST["email"])){
        header("location:index.php?action=inscription&error=email");
    }
    if (empty($_POST["name"])){
        header("location:index.php?action=inscription&error=name");
    }
    if (empty($_POST["surname"])){
        header("location:index.php?action=inscription&error=surname");
    }
    if ($repo->getUserByEmail($_POST["email"])){
        header("location:index.php?action=inscription&error=emailreadyused");
    }
    if(empty($_POST['pass']) || $_POST['pass']!=$_POST['re_pass'] || !preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$_POST['pass'])){
        header("location:index.php?action=inscription&error=mdp");
    }
    if (!$_POST["agree-term"]){
        header("location:index.php?action=inscription&error=unacceptedagreeterm");
    }
    $tmpUser=new User();
    $tmpUser->user_email=$_POST["email"];
    $tmpUser->user_surname=$_POST["surname"];
    $tmpUser->user_name=$_POST["name"];
    $tmpUser->user_password=password_hash($_POST["pass"],PASSWORD_BCRYPT);
    $repo->insertUserIntoBdd($tmpUser);
    header("location:index.php?action=viewtoken&email=$_POST[email]");
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