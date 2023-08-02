<?php
class Category_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    function getAllCategoryFull(){
        function activateOnMap($query){
            $tmpUser=new Category();
            $tmpUser->createCategoryFromQuery($query);
            $tmpUser->setCategoryTotalViews();
            $tmpUser->setCategoryTotalLikes();
            $tmpUser->setCategoryNbLesson();
            return $tmpUser;
        };
        $sql = "SELECT category_id, category_name, category_logo, category_description, theme_id
        FROM category";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $reqResult = $req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activateOnMap", $reqResult);
    }

    public function getCategoryByName($name){
        $sql="SELECT * FROM category WHERE category_name=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$name);
        $req->execute();
        $catValues=$req->fetch(PDO::FETCH_ASSOC);
        $cat=new Category();
        $cat->createCategoryFromQuery($catValues);
        if (!$catValues){
            return false;
        } 

        return $cat;
    }

    public function getCategoryById($id){
        $sql="SELECT * FROM category WHERE category_id=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$id);
        $req->execute();
        $catValues=$req->fetch(PDO::FETCH_ASSOC);
        $cat=new Category();
        $cat->createCategoryFromQuery($catValues);
        if (!$catValues){
            return false;
        } 
        return $cat;
    }

    public function getCategoryByThemeId($themeId){
        $sql = "SELECT * FROM category WHERE theme_id = ?";
        $req = $this->bdd->prepare($sql);
        $req->bindParam(1,$themeId);
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        foreach($categories as $categorie){
            $tmpCat = new Category();
            $tmpCat->createCategoryFromQuery($categorie);
            $categories[$i] = $tmpCat;
            $i++;
        }
        return $categories;
    }
    
    public function getAllCategoryName(){
        $sql="SELECT category_name FROM category";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_NUM);
    }

    /** retourn toutes les catégories nécessaires à une catégorie donnée */
    public function getNeededCategories(Category $category){
        function callback($query){
            $tmpCat=new Category();
            $tmpCat->createCategoryFromQuery($query);
            return $tmpCat;
        }
        $sql="SELECT c2.category_id,c2.category_name,c2.category_logo,c2.category_description 
        FROM category c1 INNER JOIN necessite n on c1.category_id = n.necessite_child
        INNER JOIN category c2 on n.necessite_parent = c2.category_id
        WHERE c1.category_id = ".$category->getCategoryId();
        $req=$this->bdd->prepare($sql);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        if (!$result){
            return $result;
        }
        return array_map("callback",$result);
        
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
        $sql .= ", category_main_color=?";
        $sql .= ", category_white_logo=?";
        $newLogoName = uniqid("category").".".explode("/",mime_content_type($category->getCategoryLogo()))[1];
        $newWhiteLogoName = uniqid("category").".".explode("/",mime_content_type($category->getCategoryWhiteLogo()))[1];
        if (move_uploaded_file($category->getCategoryLogo(),"assets/img/category_logo/basic/".$newLogoName)){
            $category->setLogo($newLogoName);
        }
        else{
            return ['success'=>FALSE,"error"=>"7"];
        }
        if (move_uploaded_file($category->getCategoryWhiteLogo(),"assets/img/category_logo/alt/".$newWhiteLogoName)){
            $category->setWhiteLogo($newWhiteLogoName);
        }
        else{
            unlink("/assets/img/category_logo/basic/".$category->getCategoryLogo());
            return ['success'=>FALSE,"error"=>"7"];
        }
        $req = $this->bdd->prepare($sql);
        $categoryName = $category->getCategoryName();
        $categoryWhiteLogo = $category->getCategoryWhiteLogo();
        $categoryMainColor = $category->getCategoryMainColor();
        $categoryLogo = $category->getCategoryLogo();
        $categoryDescription = $category->getCategoryDescription();
        $themeId = $category->getThemeId();
        $req->bindParam(1, $categoryName);
        $req->bindParam(2, $categoryLogo);
        $req->bindParam(3, $categoryDescription);
        $req->bindParam(4, $themeId);
        $req->bindParam(5, $categoryMainColor);
        $req->bindParam(6, $categoryWhiteLogo);
        if ($req->execute()){
            return ["success"=>TRUE];
        }
        {
            return ["success"=>FALSE,"error"=>8];
        }
        
    } 

    function getAllCategories(){
        function activate($query){
            $tmpUser=new Category();
            $tmpUser->createCategoryFromQuery($query);
            $tmpUser->setCategoryTotalViews();
            $tmpUser->setCategoryTotalLikes();
            $tmpUser->setCategoryNbLesson();
            return $tmpUser;
        };
        $sql = "SELECT category_id, category_name, category_logo, category_description, theme_id
        FROM category";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $reqResult = $req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activate", $reqResult);
    }

}
?>