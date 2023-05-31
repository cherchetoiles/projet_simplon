<?php
class Category
{
    private int $category_id;
    private string $category_name;
    private string $category_logo;
    private string $category_description;
    private array $category_views;
    private array $lessonsFromCategory;
    private array $categoriesNeeded;
    private int $theme_id;

    public function createCategoryFromRequest($category_id,$category_name,$category_logo,$category_description,$theme_id){
        $this->category_id=$category_id;
        $this->category_name=$category_name;
        $this->category_logo=$category_logo;
        $this->category_description=$category_description;
        $this->theme_id=$theme_id;
    }

    public function getCategoryId(){
        return $this->category_id;
    }
    public function getCategoryName(){
        return $this->category_name;
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
    public function setCategoryId(){
        $newName=explode(".",$this->category_logo);
        $newName=uniqid().".".end($newName);
        $this->category_logo=$newName;
    }    
}
?>