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
        if (!preg_match("/^http:\/\//m",$content) && !preg_match("/^https:\/\//m",$content)){
            return "lien de la ressource incorrecte";
        }
        $this->ressource_content=$content;
        $this->ressource_name=$name;
        $this->lesson_id=$lesson_id;
        return "";
    }

    public function createRessourceFromQuery($query){
        if (isset($query['id_ressource'])){
            $this->ressource_id = $query['id_ressource'];
        }
        if (isset($query['content'])){
            $this->ressource_content = $query['content'];
        }
        if (isset($query['ressource_name'])){
            $this->ressource_name = $query['ressource_name'];
        }
        if (isset($query['lesson_id'])){
            $this->lesson_id = $query['lesson_id'];
        }
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