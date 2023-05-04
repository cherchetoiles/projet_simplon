<?php
include("config/connect_bdd.php");

include("model/Theme.php");

include("repository/Theme_repo.php");



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
                echo "test";
                // header("location:index.php");
            }
            else{
                echo "test";
                echo "test";
                // unlink("assets/theme_logo/".$theme->getThemeLogo());
                // header("location:index.php");
            }
        }
        else{
            echo "test";
            echo "test";
            echo "test";
            // header("location:index.php");
        }
    }
    else{
        echo "test";
        echo "test";
        echo "test";
        echo "test";
        // header("location:index.php");
    }
}



?>