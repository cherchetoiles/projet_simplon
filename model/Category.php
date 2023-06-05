<?php
class Category
{
    private int $category_id;
    private string $category_name;
    private string $category_logo;
    private string $category_white_logo;
    private string $category_description;
    private int $category_views;
    private int $category_likes;
    private $category_nb_lesson;
    private array $lessonsFromCategory;
    private array $categoriesNeeded;
    private int $theme_id;
  
  public function getCategoryName(){
        return $this->category_name;
    }

   public function createCategoryFromQuery($query){
       if (isset($query["category_id"])){
            $this->category_id=$query["category_id"];
        }
        if (isset($query["category_name"])){
            $this->category_name=$query["category_name"];
        }
        if (isset($query["category_logo"])){
            $this->category_logo=$query["category_logo"];
        }
        if (isset($query["category_description"])){
            $this->category_description=$query["category_description"];
        }
        if (isset($query["theme_id"])){
            $this->theme_id=$query["theme_id"];
        }
    }
    public function createCategoryFromRequest($category_id,$category_name,$category_logo,$category_white_logo,$category_description,$theme_id){
        $this->category_id=$category_id;
        $this->category_name=$category_name;
        $this->category_white_logo=$category_white_logo;
        $this->category_logo=$category_logo;
        $this->category_description=$category_description;
        $this->theme_id=$theme_id;
    }

    public function getCategoryId(){
        return $this->category_id;
    }

    public function getCategoryWhiteLogo(){
        return $this->category_white_logo;
    }
    
    public function getCategoryLogo(){
        return $this->category_logo;
    }
    public function getCategoryDescription(){
        return $this->category_description;
    }
    public function getThemeId(){
        return $this->theme_id;
    }
    public function getCategoryViews(){
        return $this->category_views;
    }
    public function getCategoryLikes(){
        return $this->category_likes;
    }
    public function getCategoryNbLesson(){
        return $this->category_nb_lesson;
    }
    
    public function createCategoryToInsert($category_name,$category_logo,$category_description,$theme_id){
        $this->category_name=$category_name;
        $this->category_logo=$category_logo;
        $this->category_description=$category_description;
        $this->theme_id=$theme_id;
    }
    public function verifyCategory($file_size, $file_type) {
        if (empty($this->category_name) || strlen($this->category_name) > 63) {
            return "wrong_name";
        }
        if (empty($this->category_logo)) {
            return "no_logo";
        }
        if ($file_size > 300000) {
            return "tooFatLogo";
        }
        if ($file_type != "webp") {
            return "wrongFormat";
        }
        return "True";
    }
    public function setCategoryTotalViews(){
        $sql="SELECT SUM(nb_vue) as total_vue FROM(SELECT COUNT(DISTINCT w.user_id) as nb_vue FROM lesson l 
        INNER JOIN watch w ON l.lesson_id = w.lesson_id
        WHERE l.category_id = ".$this->category_id."
        GROUP BY l.lesson_id) as views";
        $repo=new Category_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->category_views=0;
        }
        else{
            $this->category_views=intval($reqResult);
        }
    }
    public function setCategoryTotalLikes(){
        $sql="SELECT SUM(nb_like) as total_like FROM(SELECT COUNT(DISTINCT f.user_id) as nb_like FROM lesson l 
        INNER JOIN fav f ON l.lesson_id = f.lesson_id
        WHERE l.user_id = ".$this->category_id."
        GROUP BY l.lesson_id) as likes";
        $repo=new Category_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->category_likes=0;
        }
        else{
            $this->category_likes=intval($reqResult);
        }
    }
    public function setCategoryNbLesson(){
        $sql="SELECT COUNT(DISTINCT lesson_id) as nb_lesson FROM lesson WHERE category_id=".$this->category_id;
        $repo=new User_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->category_nb_lesson=0;
        }
        else{
            $this->category_nb_lesson=intval($reqResult);
        }
    }
    public function setCategoryId(){
        $newName=explode(".",$this->category_logo);
        $newName=uniqid().".".end($newName);
        $this->category_logo=$newName;
    }   
}
?>