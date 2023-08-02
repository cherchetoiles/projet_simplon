<?php
class Theme
{
    private int $theme_id;
    private string $theme_name;
    private string $theme_logo;
    private int $theme_views;
    private int $theme_likes;
    private $theme_nb_lesson;
    private array $categoriesFromTheme;

    public function getThemeId(){
        return $this->theme_id;
    }

    public function getThemeLogo(){
        return $this->theme_logo;
    }

    public function getThemeName(){
        return $this->theme_name;
    }

    public function getThemelikes(){
        return $this->theme_likes;

    }public function getthemeViews(){
        return $this->theme_views;
    }

    public function getCategoriesFromTheme(){
        return $this->categoriesFromTheme;
    }

    public function setCategoriesFromTheme(){
        $repo = new Category_repo();
        $this->categoriesFromTheme = $repo ->getCategoryByThemeId($this->theme_id);
    }

    public function setLessonFromCategoriesFromTheme(){
        $i=0;
        foreach($this->categoriesFromTheme as $category){
            $category->setLessonFromCategory();
            if (empty($category->getLessonFromCategory())){
                array_splice($this->categoriesFromTheme,$i,1);
                $i--;
            }
            $i++;
        }
    }

    public function getThemeNbLesson(){
        return $this->theme_nb_lesson;
    }

    public function createThemeToInsert($theme_name,$theme_logo){
        $this->theme_name=$theme_name;
        $this->theme_logo=$theme_logo;
    }

    public function verifyTheme($file_size,$file_type){
        if(empty($this->theme_name) or (strlen($this->theme_name)>63)){
            return "wrong_name";
        }
        if(empty($this->theme_logo)){
            return "no_logo";
        }
        if($file_size>300000){
            return "tooFatLogo";
        }
        if($file_type!="webp"){
            return "wrongFormat";
        }
        return "True";
    }

    public function createThemeFromQuery($query){
        if (isset($query["theme_id"])){
             $this->theme_id=$query["theme_id"];
         }
         if (isset($query["theme_name"])){
             $this->theme_name=$query["theme_name"];
         }
         if (isset($query["theme_logo"])){
             $this->theme_logo=$query["theme_logo"];
         }
     }

    public function setThemeTotalViews(){
        $sql="SELECT SUM(nb_vue) as total_vue FROM(SELECT COUNT(DISTINCT w.user_id) as nb_vue FROM lesson l 
        INNER JOIN watch w ON l.lesson_id = w.lesson_id
        WHERE l.category_id = ".$this->theme_id."
        GROUP BY l.lesson_id) as views";
        $repo=new Theme_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->theme_views=0;
        }
        else{
            $this->theme_views=intval($reqResult);
        }
    }
    public function setThemeTotalLikes(){
        $sql="SELECT SUM(nb_like) as total_like FROM(SELECT COUNT(DISTINCT f.user_id) as nb_like FROM lesson l 
        INNER JOIN fav f ON l.lesson_id = f.lesson_id
        WHERE l.user_id = ".$this->theme_id."
        GROUP BY l.lesson_id) as likes";
        $repo=new Theme_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->theme_likes=0;
        }
        else{
            $this->theme_likes=intval($reqResult);
        }
    }

    public function setThemeNbLesson(){
        $sql="SELECT COUNT(DISTINCT lesson_id) as nb_lesson FROM lesson WHERE category_id=".$this->theme_id;
        $repo=new User_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->theme_nb_lesson=0;
        }
        else{
            $this->theme_nb_lesson=intval($reqResult);
        }
    }
    public function setThemeId(){
        $newName=explode(".",$this->theme_logo);
        $newName=uniqid().".".end($newName);
        $this->theme_logo=$newName;
    }
}
?>