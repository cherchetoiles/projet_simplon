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
        $cat->createCategoryFromRequest($catValues[0],$catValues[1],$catValues[2],$catValues[3],$catValues[4]);
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