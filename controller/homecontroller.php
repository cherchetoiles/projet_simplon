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

function updateProfil(){
    $user = $_SESSION['user'];
    $repo = new User_repo();
    $user_id = ($_SESSION['user']->getUserId());
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user->setUserEmail($user_email);
    $user->setUserPassword($user_password);
    if($user->getUserEmail() != ''){
        $repo->updateEmail($user_email,$user->getUserId());
    }
    if($user->getUserPassword() != ''){
        $repo->updatePassword($user_password,$user->getUserId());
    }
    header('Location:index.php?action=test');
}

function modaltest() {
    require('view/modaltest.php');
}

function updateAvatar(){
    $user_repo = new User_repo();
    $user = $_SESSION['user'];
    $profil_picture=$user_repo->updateAvatar($_FILES['profile_photo'],$user);
    echo $profil_picture;
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
    $user = new User();
    $repo=new User_repo();
    $repo_lesson=new Lesson_repo();
    $lessons=$repo_lesson->getAllLessonFull();
    include("view/nos_cours.php");
}

function cours(){
    $category = new Category();
    $repo = new Category_repo();
    $need_category = new Category();
    $repo_lesson=new Lesson_repo();
    $lessons=$repo_lesson->getAllLessonFull();
    include("view/cours.php");
}

function lesson(){
    if (isset($_GET['id'])){
        $repo = new Lesson_repo();
        $reqResult = $repo -> getLesson("lesson_id",["lesson_id"=>$_GET['id'],"withcategorieslesson"=>TRUE,"limit"=>1]);
        if ($reqResult){
            $lesson=$reqResult[0];
            $lesson['lesson']->setLessonRessources();
            $lesson['category']->setLessonFromCategory();
            require('view/lesson.php');
        }
        else{
            header("location: ?action=homepage");
        }   
    }
    else{
        header("location: ?action=homepage");
    }
    
}

function formVideo(){
    require("view/ajoutVideoForm.php");
}

function homepage(){
    $repo = new Lesson_repo();
    $topLesson=$repo -> getLesson("total.views/total.favorite DESC",["limit"=>1])[0];
    $repo = new Category_repo();
    $topCategory=$repo -> getPopularCategory("total.views/total.favorite DESC",["limit"=>16]);
    if ($topLesson["lesson"]-> getLessonDifficult() < 4){
        $colors = ["red","#D9D9D9","#EAEAEA"];
    }
    elseif ($topLesson["lesson"]->getLessonDifficult() > 6){
        $colors = ["red","red","red"];
    }
    else {
        $colors = ["red","red","#D9D9D9"];
    }
    $svg = '<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.04289 7.29289C0.75 7.58579 0.75 8.05719 0.75 9V15C0.75 15.9428 0.75 16.4142 1.04289 16.7071C1.33579 17 1.80719 17 2.75 17C3.69281 17 4.16421 17 4.45711 16.7071C4.75 16.4142 4.75 15.9428 4.75 15V9C4.75 8.05719 4.75 7.58579 4.45711 7.29289C4.16421 7 3.69281 7 2.75 7C1.80719 7 1.33579 7 1.04289 7.29289Z" fill='.$colors[0].' />
                <path d="M7.75 5C7.75 4.05719 7.75 3.58579 8.04289 3.29289C8.33579 3 8.80719 3 9.75 3C10.6928 3 11.1642 3 11.4571 3.29289C11.75 3.58579 11.75 4.05719 11.75 5V15C11.75 15.9428 11.75 16.4142 11.4571 16.7071C11.1642 17 10.6928 17 9.75 17C8.80719 17 8.33579 17 8.04289 16.7071C7.75 16.4142 7.75 15.9428 7.75 15V5Z" fill='.$colors[1].' />
                <path d="M15.0429 0.292893C14.75 0.585786 14.75 1.05719 14.75 2V15C14.75 15.9428 14.75 16.4142 15.0429 16.7071C15.3358 17 15.8072 17 16.75 17C17.6928 17 18.1642 17 18.4571 16.7071C18.75 16.4142 18.75 15.9428 18.75 15V2C18.75 1.05719 18.75 0.585786 18.4571 0.292893C18.1642 0 17.6928 0 16.75 0C15.8072 0 15.3358 0 15.0429 0.292893Z" fill='.$colors[2].' />
                <path d="M0.75 19.25C0.335786 19.25 0 19.5858 0 20C0 20.4142 0.335786 20.75 0.75 20.75H18.75C19.1642 20.75 19.5 20.4142 19.5 20C19.5 19.5858 19.1642 19.25 18.75 19.25H0.75Z" fill="#B7B7B7"/>
            </svg>';
    require('view/homepage.php');
}

function profil(){
    $user=new User_repo();
    $lessons=$user->getLessonsByUser($_SESSION['user']->getUserId());
    $fav_lessons=$user->getFavLesson($_SESSION['user']->getUserId());
    $finish_lessons=$user->getFinishLesson($_SESSION['user']->getUserId());
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
            if ($_POST['save']=="on"){
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

// function inFav($lesson_id, $user_id){
//     $fav_count = new User_repo();
//     $fav_count->getFavLesson($_SESSION['user']->getUserId());
// }


function FavLesson(){
    $fav_lessons = new User_repo();
    $fav_lessons->addFavLesson($_SESSION['user'],$_GET['lesson_id']);
    // header('Location:?action=nos_cours');  
}

function UnFavLesson(){
    $fav_lessons = new User_repo();
    $fav_lessons->deleteFavLesson($_SESSION['user'],$_GET['lesson_id']);
    header('Location:?action=profil');
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
        $toEncode[]="<div class='flex flex-col items-center gap-10 p-6 bg-white rounded-lg'>
                        <div class='flex flex-col items-center'>
                            <img src='assets/img/lesson_minature/".$result["lesson"]->getLessonCover()."'>
                        </div>
                        <div class='flex flex-col items-center w-full'>
                            <span class='text-xl font-semibold text-center'>".$result["lesson"]->getLessonTitle()."</span>
                            <div class='flex items-center gap-2'>
                                <img src='assets/img/user_avatar/".$result["user"]->getUserAvatar()."' class='w-12 rounded-full'>
                                <span class='text-lg leading-none'>".$result["user"]->getUserSurname()." ".$result["user"]->getUserName()."</span>
                            </div>
                            <div class='flex w-full mt-4 justify-evenly'>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/eye_icon.svg'>
                                    <span class='italic leading-none'>".$showedViews.$viewsSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/heart_icon.svg'>
                                    <span class='italic leading-none'>".$showedLikes.$likesSuffix."</span>
                                </div>
                            </div>
                        </div>
                        <div class='flex flex-col items-center w-full gap-3'>
                            <div class='flex w-full text-lg justify-evenly'>
                                <span class='text-blue'>".$result["category"]->getCategoryName()."</span>
                                <span class='italic'>Niveau ".$result["lesson"]->getLessonDifficult()."</span>
                            </div>
                            <span>".$result["lesson"]->getLessonDate()."</span>
                            <div class='flex justify-center w-full gap-4'>
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
        $toEncode[]="<div class='flex flex-col items-center gap-5 p-6 bg-white rounded-lg'>
                        <div class='flex flex-col items-center w-3/4 mt-3 overflow-hidden rounded-full'>
                            <img src='assets/img/user_avatar/".$result->getUserAvatar()."' class='w-full'>
                        </div>
                        <div class='flex flex-col items-center w-full'>
                            <span class='text-xl font-semibold text-center'>".$result->getUserSurname()." ".$result->getUserName()."</span>
                            <div class='flex flex-col items-center gap-2'>
                                <span class='text-lg leading-none'>".$result->getUserSpe()."</span>
                                <span class='text-lg leading-none'>".$result->getUserEmail()."</span>
                            </div>
                        </div>
                        <div class='flex flex-col items-center w-full gap-3'>
                            <div class='flex w-full mt-4 justify-evenly'>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/eye_icon.svg'>
                                    <span class='italic leading-none'>".$showedViews.$viewsSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/heart_icon.svg'>
                                    <span class='italic leading-none'>".$showedLikes.$likesSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/nb_lesson_icon.svg'>
                                    <span class='italic leading-none'>".$result->getUserNbLesson()."</span>
                                </div>
                            </div>
                            <div class='flex justify-center w-full gap-4'>
                                <img src='assets/svg/edit_icon.svg' data-id='".$result->getUserId()."'>
                                <img src='assets/svg/trash_icon.svg' data-id='".$result->getUserId()."'>
                            </div>
                        </div>
                    </div>";
    }
    echo json_encode($toEncode);
}
function getCardsForCrudCategory(){
    $repo = new Category_repo();
    $reqResult=$repo->getAllCategoryFull();
    foreach ($reqResult as $result){
        $showedViews=$result->getCategoryViews();
        $viewsSuffix="";
        $showedLikes=$result->getCategoryLikes();
        $likesSuffix="";
        if ($result->getCategoryViews()>10000){
            $showedViews=intdiv($result->getCategoryViews(),1000);
            $viewsSuffix="K";
        }
        if ($result->getCategoryLikes()>10000){
            $showedLikes=intdiv($result->getCategoryLikes(),1000);
            $likesSuffix="K";
        }
        $toEncode[]="<div class='flex flex-col items-center gap-5 p-6 bg-white rounded-lg'>
                        <div class='flex flex-col items-center w-3/4 mt-3 overflow-hidden rounded-full'>
                            <img src='assets/img/user_avatar/".$result->getCategoryLogo()."' class='w-full'>
                        </div>
                        <div class='flex flex-col items-center w-full'>
                            <span class='text-xl font-semibold text-center'>".$result->getCategoryName()."
                            <div class='flex flex-col items-center gap-2'>
                                <span class='text-lg leading-none'>".$result->getCategoryDescription()."</span>
                            </div>
                        </div>
                        <div class='flex flex-col items-center w-full gap-3'>
                            <div class='flex w-full mt-4 justify-evenly'>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/eye_icon.svg'>
                                    <span class='italic leading-none'>".$showedViews.$viewsSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/heart_icon.svg'>
                                    <span class='italic leading-none'>".$showedLikes.$likesSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/nb_lesson_icon.svg'>
                                    <span class='italic leading-none'>".$result->getCategoryNbLesson()."</span>
                                </div>
                            </div>
                            <div class='flex justify-center w-full gap-4'>
                                <img src='assets/svg/edit_icon.svg' data-id='".$result->getCategoryId()."'>
                                <img src='assets/svg/trash_icon.svg' data-id='".$result->getCategoryId()."'>
                            </div>
                        </div>
                    </div>";
    }
    echo json_encode($toEncode);
}
function getCardsForCrudTheme(){
    $repo = new Theme_repo();
    $reqResult=$repo->getAllThemeFull();
    foreach ($reqResult as $result){
        $showedViews=$result->getThemeViews();
        $viewsSuffix="";
        $showedLikes=$result->getThemelikes();
        $likesSuffix="";
        if ($result->getThemeViews()>10000){
            $showedViews=intdiv($result->getThemeViews(),1000);
            $viewsSuffix="K";
        }
        if ($result->getThemelikes()>10000){
            $showedLikes=intdiv($result->getThemelikes(),1000);
            $likesSuffix="K";
        }
        $toEncode[]="<div class='flex flex-col items-center gap-5 p-6 bg-white rounded-lg'>
                        <div class='flex flex-col items-center w-3/4 mt-3 overflow-hidden rounded-full'>
                            <img src='assets/img/user_avatar/".$result->getThemeLogo()."' class='w-full'>
                        </div>
                        <div class='flex flex-col items-center w-full'>
                            <span class='text-xl font-semibold text-center'>".$result->getThemeName()."
                            <div class='flex flex-col items-center gap-2'>
                            </div>
                        </div>
                        <div class='flex flex-col items-center w-full gap-3'>
                            <div class='flex w-full mt-4 justify-evenly'>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/eye_icon.svg'>
                                    <span class='italic leading-none'>".$showedViews.$viewsSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/heart_icon.svg'>
                                    <span class='italic leading-none'>".$showedLikes.$likesSuffix."</span>
                                </div>
                                <div class='flex items-center gap-1'>
                                    <img src='assets/svg/nb_lesson_icon.svg'>
                                    <span class='italic leading-none'>".$result->getThemeNbLesson()."</span>
                                </div>
                            </div>
                            <div class='flex justify-center w-full gap-4'>
                                <img src='assets/svg/edit_icon.svg' data-id='".$result->getThemeId()."'>
                                <img src='assets/svg/trash_icon.svg' data-id='".$result->getThemeId()."'>
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
        $lesson->createLessonToInsert($_POST['title'],$_POST['level'],$_POST['description'],$_POST['level'],$_POST["attract_title"],uniqid().".".$content_type,$cat->getCategoryId(),$cover_type,$content_type,$_SESSION['user']->getUserId());
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
                    if (isset($_POST['ressources-name'])){
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
