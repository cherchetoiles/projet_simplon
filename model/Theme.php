<?php
class Theme
{
    private int $theme_id;
    private string $theme_name;
    private string $theme_logo;
    private array $theme_views;
    private array $categoriesFromTheme;

    public function getThemeLogo(){
        return $this->theme_logo;
    }

    public function getThemeName(){
        return $this->theme_name;
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

    public function setThemeId(){
        $newName=explode(".",$this->theme_logo);
        $newName=uniqid().".".end($newName);
        $this->theme_logo=$newName;
    }
}
?>