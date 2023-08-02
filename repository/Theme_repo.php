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
    
    public function getAllThemesMin() {
        $sql = "SELECT theme_id,theme_name,theme_logo FROM theme";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $themes = $req->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        foreach($themes as $theme){
            $tmpTheme = new Theme();
            $tmpTheme->createThemeFromQuery($theme);
            $themes[$i]=$tmpTheme;
            $i+=1;
        }    
        return $themes;
    }

    public function getAllThemeFull(){
        function activateOnMap($query){
            $tmpUser=new Theme();
            $tmpUser->createThemeFromQuery($query);
            $tmpUser->setThemeTotalViews();
            $tmpUser->setThemeTotalLikes();
            $tmpUser->setThemeNbLesson();
            return $tmpUser;
        };
        $sql = "SELECT theme_id, theme_name, theme_logo
        FROM theme";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $reqResult = $req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activateOnMap", $reqResult);
      
    }

    public function getThemeById($id){
        $sql = "SELECT * FROM theme WHERE theme_id = ?";
        $req = $this->bdd->prepare($sql);
        $req->bindParam(1,$id);
        $req->execute();
        return $req->fetch();
    }
}
?>