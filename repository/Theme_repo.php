<?php
class Theme_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function insertThemeIntoBdd($theme){
        $sql="INSERT INTO theme SET ";
        $sql.="theme_name=?";
        $sql.=",theme_logo=?";
        $req=$this->bdd->prepare($sql);
        $themeName=$theme->getThemeName();
        $themeLogo=$theme->getThemeLogo();
        $req->bindParam(1,$themeName);
        $req->bindParam(2,$themeLogo);
        $req->execute();
        return true;
    }  
    
    public function getAllThemes($theme_name) {
        $sql = "SELECT * FROM theme WHERE theme_name = ?";
        $req = $this->bdd->prepare($sql);
        $req->execute([$theme_name]);
        return $req->fetch();
    }
}
?>