<?php
session_start();
include('config/Connect_bdd.php');

include('repository/User_repo.php');
include("repository/Theme_repo.php");

include('model/User.php');
include("model/Theme.php");


function signup(){
    require('view/signup.php');
}

function signin(){
    require('view/signin.php');
}

function addTheme(){
    include("view/addTheme.php");

}

function signin_treat(){
    if (empty($_POST['your_name']) and empty($_POST['your_pass'])){
        header("location: index.php");
    }
    $repo = new User_repo();
    $tmpUser=$repo->getUserByEmail($_POST['your_email']);
    $user=new user();
    if ($tmpUser){
        $user->createUserFromQuery($tmpUser);
        $isOk=$user->verifUserToSignin($_POST['your_pass']);
        if ($isOk=="True"){
            if ($_POST['remember_me']=="on"){
            setcookie("simplon_name",$_POST['your_email'],time()+60*60*24*30,"/",httponly:TRUE);
            }
        $user->connectUser();
        header("location:index.php?action=signin");    
        }
        else{
            header("location:index.php?action=signin&error".$isOk);
        }
    }
    else{
        header("location:index.php?action=signin&error=userdontexist");
    }
    
    
}

function signup_treat(){
    var_dump($_POST);
    $repo = new User_repo();
    $tmpUser=new User();
    $tmpUser->createUserToSignup($_POST['email'],$_POST['name'],$_POST['surname'],$_POST['pass']);
    $isOk=$tmpUser->verifUserToSignup($_POST['re_pass'],$repo,$_POST['agree-term']);
    var_dump($isOk);
    if ($isOk=="True"){
        $tmpUser->cryptUserPassword();
        $repo->insertUserIntoBdd($tmpUser);
        header("location:index.php?action=signin");
    }
    else{
        header("location:index.php?action=signup&error=".$isOk);
    }
}

function addThemeTreat(){
    var_dump($_FILES);
    $file_type=explode("/",$_FILES["theme_logo"]["type"])[1];
    $theme=new Theme();
    $theme->createThemeToInsert($_POST["theme_name"],$_FILES["theme_logo"]["name"]);
    $isOk=$theme->verifyTheme($_FILES['theme_logo']["size"],$file_type);
    if($isOk=="True"){
        $theme->setThemeId();
        if (move_uploaded_file($_FILES["theme_logo"]["tmp_name"],"assets/theme_logo/".$theme->getThemeLogo())){
            $repo=new Theme_repo();
            if($repo->insertThemeIntoBdd($theme)){
                header("location:index.php?action=addTheme");
            }
            else{
                unlink("assets/theme_logo/".$theme->getThemeLogo());
                header("location:index.php?action=addTheme&error=failedinsert");
            }
        }
        else{
            header("location:index.php?action=addTheme&error=failedupload");
        }
    }
    else{
        header("location:index.php?action=addTheme&error=".$isOk);
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