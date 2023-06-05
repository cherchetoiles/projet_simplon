<?php
class Category_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function getCategoryByName($name){
        $sql="SELECT * FROM category WHERE category_name=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$name);
        $req->execute();
        $catValues=$req->fetch(PDO::FETCH_NUM);
        $cat=new Category();

        $cat->createCategoryFromQuery($catValues);

        if (!$catValues){
            return false;
        }

        return $cat;
    }

    public function getAllCategoryName(){
        $sql="SELECT category_name FROM category";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_NUM);
    }
    public function createCategoryToInsert(Category $category){
        $sql="INSERT INTO category SET category_name=?, category_logo=?, category_description=?, theme_id=?";
        $req=$this->bdd->prepare($sql);
        recurBind($req,[$category->getCategoryName(),$category->getCategoryLogo(),$category->getCategoryDescription(),$category->getThemeId()],4);
        $req->execute();
        return true;
    }

    function getPopularCategory(){
        function activateOnMap($query){
            $tmpCat=new Category();
            $tmpCat->createCategoryFromQuery($query);
            return $tmpCat;
        };
        $sql = "SELECT c.category_id,c.category_name,c.category_logo,c.category_logo,c.category_main_color,c.category_description,c.category_white_logo
        FROM category c
        NATURAL JOIN lesson l
        LEFT JOIN (SELECT COUNT(DISTINCT w.user_id) as nb_vues,COUNT(DISTINCT f.user_id) as nb_fav,l.lesson_id
                   		FROM lesson l
                   		LEFT JOIN watch w on l.lesson_id = w.lesson_id 
                        LEFT JOIN fav f on l.lesson_id = f.lesson_id
                   		GROUP BY l.lesson_id) total ON l.lesson_id=total.lesson_id
        GROUP BY c.category_id
        ORDER BY SUM(total.nb_vues)/SUM(total.nb_fav)";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $reqResult = $req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activateOnMap", $reqResult);
    }

    public function insertCategoryIntoBdd($category) {
        $sql = "INSERT INTO category SET ";
        $sql .= "category_name=?";
        $sql .= ", category_logo=?";
        $sql .= ", category_description=?";
        $sql .= ", theme_id=?";
        $req = $this->bdd->prepare($sql);
        $categoryName = $category->getCategoryName();
        $categoryLogo = $category->getCategoryLogo();
        $categoryDescription = $category->getCategoryDescription();
        $themeId = $category->getThemeId();
        $req->bindParam(1, $categoryName);
        $req->bindParam(2, $categoryLogo);
        $req->bindParam(3, $categoryDescription);
        $req->bindParam(4, $themeId);
        $req->execute();
        return true;
    }
}
?>