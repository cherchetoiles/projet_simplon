<?php

include('config/Connect_bdd.php');
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

function logout(){
    session_destroy();
    header('Location: ?action=signin');
}

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

function nos_cours(){
    include("view/nos_cours.php");
}
function cours(){
    include("view/cours.php");
}

function lesson(){
    require('view/lesson.php');
}

function formVideo(){
    require("view/ajoutVideoForm.php");
}

function homepage(){
    require('view/homepage.php');
}

function profil(){
    $user=new User_repo();
    $lessons=$user->getLessonsByUser($_SESSION['user']->getUserId());
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

function getCardsForCrudLesson(){
    $repo = new Lesson_repo();
    $reqResult=$repo->getAllLessonFull();
    // var_dump($reqResult);
    $toEncode=[];
    foreach ($reqResult as $result){
        $showedViews=$result["lesson"]->getLessonViews();
        $viewsSuffix="";
        $showedLikes=$result["lesson"]->getLessonLikes();
        $likesSuffix="";
        if ($result["lesson"]->getLessonViews()>10000){
            $showedViews=intdiv($result["lesson"]->getLessonViews(),1000);
            $viewsSuffix="K";
        }
        if ($result["lesson"]->getLessonLikes()>10000){
            $showedLikes=intdiv($result['lesson']->getLessonLikes(),1000);
            $likesSuffix="K";
        }
        $toEncode[]="<div class='rounded-lg bg-white p-6 flex flex-col items-center gap-10'>
                        <div class='flex flex-col items-center'>
                            <img src='assets/img/lesson_minature/".$result["lesson"]->getLessonCover()."'>
                        </div>
                        <div class='flex flex-col items-center w-full'>
                            <span class='font-semibold text-xl text-center'>".$result["lesson"]->getLessonTitle()."</span>
                            <div class='flex items-center gap-2'>
                                <img src='assets/img/user_avatar/".$result["user"]->getUserAvatar()."' class='rounded-full w-12'>
                                <span class='leading-none text-lg'>".$result["user"]->getUserSurname()." ".$result["user"]->getUserName()."</span>
                            </div>
                            <div class='flex mt-4 justify-evenly w-full'>
                                <div class='flex gap-1 items-center'>
                                    <img src='assets/svg/eye_icon.svg'>
                                    <span class='italic leading-none'>".$showedViews.$viewsSuffix."</span>
                                </div>
                                <div class='flex gap-1 items-center'>
                                    <img src='assets/svg/heart_icon.svg'>
                                    <span class='italic leading-none'>".$showedLikes.$likesSuffix."</span>
                                </div>
                            </div>
                        </div>
                        <div class='flex flex-col items-center w-full gap-3'>
                            <div class='flex justify-evenly w-full text-lg'>
                                <span class='text-blue'>".$result["category"]->getCategoryName()."</span>
                                <span class='italic'>Niveau ".$result["lesson"]->getLessonDifficult()."</span>
                            </div>
                            <span>".$result["lesson"]->getLessonDate()."</span>
                            <div class='flex w-full justify-center gap-4'>
                                <img src='assets/svg/edit_icon.svg' data-id='".$result["user"]->getUserId()."'>
                                <img src='assets/svg/trash_icon.svg' data-id='".$result["user"]->getUserId()."'>
                            </div>
                        </div>
                    </div>";
    }
    echo json_encode($toEncode);
}

function getCardsForCrudUser(){
    $repo = new User_repo();
    $reqResult=$repo->getAllUserFull();
    foreach ($reqResult as $result){
        $showedViews=$result->getUserViews();
        $viewsSuffix="";
        $showedLikes=$result->getUserLikes();
        $likesSuffix="";
        if ($result->getUserViews()>10000){
            $showedViews=intdiv($result->getuserViews(),1000);
            $viewsSuffix="K";
        }
        if ($result->getuserLikes()>10000){
            $showedLikes=intdiv($result->getuserLikes(),1000);
            $likesSuffix="K";
        }
        $toEncode[]="<div class='rounded-lg bg-white p-6 flex flex-col items-center gap-5'>
                        <div class='flex flex-col items-center w-3/4 rounded-full overflow-hidden mt-3'>
                            <img src='assets/img/user_avatar/".$result->getUserAvatar()."' class='w-full'>
                        </div>
                        <div class='flex flex-col items-center w-full'>
                            <span class='font-semibold text-xl text-center'>".$result->getUserSurname()." ".$result->getUserName()."</span>
                            <div class='flex flex-col items-center gap-2'>
                                <span class='leading-none text-lg'>".$result->getUserSpe()."</span>
                                <span class='leading-none text-lg'>".$result->getUserEmail()."</span>
                            </div>
                        </div>
                        <div class='flex flex-col items-center w-full gap-3'>
                            <div class='flex mt-4 justify-evenly w-full'>
                                <div class='flex gap-1 items-center'>
                                    <img src='assets/svg/eye_icon.svg'>
                                    <span class='italic leading-none'>".$showedViews.$viewsSuffix."</span>
                                </div>
                                <div class='flex gap-1 items-center'>
                                    <img src='assets/svg/heart_icon.svg'>
                                    <span class='italic leading-none'>".$showedLikes.$likesSuffix."</span>
                                </div>
                                <div class='flex gap-1 items-center'>
                                    <img src='assets/svg/nb_lesson_icon.svg'>
                                    <span class='italic leading-none'>".$result->getUserNbLesson()."</span>
                                </div>
                            </div>
                            <div class='flex w-full justify-center gap-4'>
                                <img src='assets/svg/edit_icon.svg' data-id='".$result->getUserId()."'>
                                <img src='assets/svg/trash_icon.svg' data-id='".$result->getUserId()."'>
                            </div>
                        </div>
                    </div>";
    }
    echo json_encode($toEncode);
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
function addCategory(){
    include('view/addCategory.php');
}
function addCategoryTreat(){
   var_dump($_FILES,$_POST);
        
        $file_type = explode("/", $_FILES["category_logo"]["type"])[1];
        $category_logo = $_FILES["category_logo"]["name"];
        $category = new Category();
        $category->createCategoryToInsert($_POST["category_name"], $category_logo, $_POST["category_description"], $_POST["theme_id"]);
        $isOk = $category->verifyCategory($_FILES["category_logo"]["size"], $file_type);
        if ($isOk == "True") {
            $category->setCategoryId();
            if (move_uploaded_file($_FILES["category_logo"]["tmp_name"], "assets/img/category_logo/" . $category_logo)) {
                $repo = new Category_repo();
                if ($repo->insertCategoryIntoBdd($category)) {
                    header("location: index.php?action=addCategory");
                } else {
                    unlink("assets/img/category_logo/" . $category_logo);
                    header("location: index.php?action=addCategory&error=failedinsert");
                }
            } else {
                header("location: index.php?action=addCategory&error=failedupload");
            }
        } else {
            header("location: index.php?action=addCategory&error=" . $isOk);
        }
    }

function addVideo(){
    if (isset(explode("/",$_FILES["content"]["type"])[1])){
        $content_type=explode("/",$_FILES["content"]["type"])[1];
    }
    else{
        $content_type="wrong";
    }
    if (isset(explode("/",$_FILES["cover"]["type"])[1])){
        $cover_type=explode("/",$_FILES["cover"]["type"])[1];
    }
    else{
        $cover_type="wrong";
    }
    $cat_repo=new Category_repo();
    
    $cat=$cat_repo->getCategoryByName($_POST["category"]);
    if (!$cat){
        $isOk="Merci de ne pas modifier les valeurs des choix de proposition.";
    }
    else{
        $lesson=new Lesson();
        $lesson->createLessonToInsert($_POST['title'],$_POST['description'],$_POST['level'],$_POST["attract_title"],uniqid().".".$content_type,$cat->getCategoryId(),$cover_type,$content_type,$_SESSION['user']->user_id);
        $isOk=$lesson->verifyLesson($_FILES['cover']["size"],$cover_type,$_FILES['content']["size"],$content_type);
    }
    if($isOk=="True"){
        if (move_uploaded_file($_FILES["content"]["tmp_name"],"assets/lesson_videos/".$lesson->getLessonContent())){
            if (move_uploaded_file($_FILES["cover"]["tmp_name"],"assets/img/lesson_miniature/".$lesson->getLessonCover())){ 
                $repo=new Lesson_repo();
                if($repo->insertLessonIntoBdd($lesson)){
                    $isOk="Reussite de l'upload des fichiers";
                    $ressourcesRepo=new Ressource_repo();
                    $max_id=$repo->getMaxLessonId()[0];
                    if (isset($_POST['ressources_name'])){
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
