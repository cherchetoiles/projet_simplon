<?php
function addTheme(){
    $file_type=explode("/",$_FILES["theme_logo"]["type"])[1];
    $theme=new Theme();
    $theme->createThemeToInsert($_POST["theme_name"],$_FILES["theme_logo"]["tmp_name"]);
    $isOk=$theme->verifyTheme($_FILES['theme_logo']["size"],$file_type);
    if($isOk=="True"){
        $tmpName=uniqid().".".$file_type;
    }
    else{
        // header vers le crud ajout avec erreur
        exit;
    }
}



?>