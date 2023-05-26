<?php
class Category
{
    private int $category_id;
    private string $category_name;
    private string $category_logo;
    private string $category_description;
    private string $category_video;
    private array $category_views;
    private array $lessonsFromCategory;
    private array $categoriesNeeded;
    private int $theme_id;

    public function createCategoryFromRequest($category_id,$category_name,$category_logo,$category_description,$theme_id,$category_video){
        $this->category_id=$category_id;
        $this->category_name=$category_name;
        $this->category_logo=$category_logo;
        $this->category_description=$category_description;
        $this->category_video=$category_video;
        $this->theme_id=$theme_id;
    }

    public function getCategoryId(){
        return $this->category_id;
    }
}
?>