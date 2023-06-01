<?php
class Ressource
{
    private int $ressource_id;
    private string $ressource_content;
    private string $ressource_name;
    private int $lesson_id;

    public function createRessourceToInsert($content,$name,$lesson_id){
        if (strlen($content)>2**7){
            return "lien de ressource trop long";
        }
        if (strlen($name)>2**6){
            return "nom de ressource trop long";
        }
        $this->ressource_content=$content;
        $this->ressource_name=$name;
        $this->lesson_id=$lesson_id;
        return "";
    }

    public function getRessourceContent(){
        return $this->ressource_content;
    }
    
    public function getRessourceName(){
        return $this->ressource_name;
    }

    public function getRessourceLessonId(){
        return $this->lesson_id;
    }
}
?>