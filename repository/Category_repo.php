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
        if (!$catValues){
            return false;
        }
        $cat->createCategoryFromRequest($catValues[0],$catValues[1],$catValues[2],$catValues[3],$catValues[4],$catValues[5]);
        return $cat;
    }

    public function getAllCategoryName(){
        $sql="SELECT category_name FROM category";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_NUM);
    }
}
?>