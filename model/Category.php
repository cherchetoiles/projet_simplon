<?php
class Category
{
    private int $category_id;
    private string $category_name;
    private string $category_logo;
    private array $category_views;
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
        if (isset($query["theme_id"])){
            $this->theme_id=$query["theme_id"];
        }
    }
}
?>