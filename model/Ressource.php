<?php
class Ressource
{
    public int $ressource_id;
    public string $content;
    public int $lesson_id;

    public function createRessourceToInsert($content,$lesson_id){
        $this->content=$content;
        $this->lesson_id=$lesson_id;
        return TRUE;
    }
}
?>