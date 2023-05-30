<?php

include('repository/User_repo.php');
include("repository/Theme_repo.php");
include("repository/Lesson_repo.php");
include("repository/Category_repo.php");
include("repository/Ressource_repo.php");

include('model/User.php');
include("model/Theme.php");
include("model/Lesson.php");
include("model/Category.php");
include("model/Ressource.php");

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

define("MAX_IMG_SIZE", 5*MB);
define("MAX_VIDEO_SIZE",100*MB);

define("VALID_IMG_TYPE", ["png","webp","jpeg"]);
define("VALID_VIDEO_TYPE", ["mp4","webm"]);

session_start();

function modaltest() {
    require('view/modaltest.php');
}

function signup(){
    require('view/signup.php');
}

function signin(){
    require('view/signin.php');
}

function addTheme(){
    include("view/addTheme.php");

}

function cours(){
    include("view/cours.php");
    include("view/footer.php");
}

function formVideo(){
    require("view/ajoutVideoForm.php");
}

function homepage(){
    require('view/homepage.php');
}

function profil(){
    require('view/profil.php');
}

function crud(){
    include("view/crud.php");
}

function signin_treat(){
    if (empty($_POST['email']) OR empty($_POST['password'])){
        header("location: index.php");
    }
    $repo = new User_repo();
    $tmpUser=$repo->getUserByEmail($_POST['email']);
    $user=new user();
    if ($tmpUser){
        $user->createUserFromQuery($tmpUser);
        $isOk=$user->verifUserToSignin($_POST['password']);
        if ($isOk=="True"){
            if ($_POST['remember_me']=="on"){
            setcookie("simplon_name",$user->getUserEmail(),time()+60*60*24*30,"/",httponly:TRUE);
            }
        $user->connectUser();
        header("location:index.php?action=homepage");    
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
    $isOk=$tmpUser->verifUserToSignup($_POST['re-pass'],$repo,$_POST['agree-term']);
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
        if (move_uploaded_file($_FILES["theme_logo"]["tmp_name"],"assets/img/theme_logo/".$theme->getThemeLogo())){
            $repo=new Theme_repo();
            if($repo->insertThemeIntoBdd($theme)){
                header("location:index.php?action=addTheme");
            }
            else{
                unlink("assets/img/theme_logo/".$theme->getThemeLogo());
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

function addVideo(){
    $cat_repo=new Category_repo();
    $cat=$cat_repo->getCategoryByName($_POST["category"]);
    $content_type=explode("/",$_FILES["content"]["type"])[1];
    $cover_type=explode("/",$_FILES["cover"]["type"])[1];
    $lesson=new Lesson();
    $lesson->createLessonToInsert($_POST['title'],$_POST['description'],$_POST['level'],$_POST["attract_title"],uniqid().".".$content_type,$cat->getCategoryId(),$cover_type,$content_type);
    $isOk=$lesson->verifyLesson($_FILES['cover']["size"],$cover_type,$_FILES['content']["size"],$content_type);
    if($isOk=="True"){
        if (move_uploaded_file($_FILES["content"]["tmp_name"],"assets/lesson_videos/".$lesson->getLessonContent())){
            if (move_uploaded_file($_FILES["cover"]["tmp_name"],"assets/img/lesson_miniature/".$lesson->getLessonCover())){ 
                $repo=new Lesson_repo();
                if($repo->insertLessonIntoBdd($lesson)){
                    $isOk="Reussite de l'upload des fichiers";
                    $ressources=[];
                    $ressourcesRepo=new Ressource_repo();
                    $max_id=$repo->getMaxLessonId()[0];
                    for ($i=0;$i<count($_POST['ressources-name']);$i++){
                        $tmpRessource=new Ressource();
                        $ressourceIsOk=$tmpRessource->createRessourceToInsert($_POST['ressources-content'][$i],$_POST['ressources-name'][$i],$max_id);
                        if ($ressourceIsOk==""){
                            if ($ressourcesRepo->insertRessourceIntoBdd($tmpRessource)){
                                $isOk.="<br> $i. Upload de ressource réussi";
                            }
                            else{
                                $isOk.="<br> $i. Upload de ressource échoué";
                            }
                        }
                        else{
                            $isOk.="<br> $i.".$ressourceIsOk;
                        }
                    }
                    echo json_encode($isOk);
                }
                else{
                    unlink("assets/lesson_videos/".$lesson->getLessonContent());
                    unlink("assets/img/lesson_miniature/".$lesson->getLessonCover());
                    echo json_encode("failedinsert");
                }
            }
            else{
                unlink("assets/lesson_videos/".$lesson->getLessonContent());
                echo json_encode("échec de l'upload de la miniature");
            }
        }
        else{
            echo json_encode("échec de l'upload de la vidéo");
        }
    }
    else{
        echo json_encode($isOk);
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
