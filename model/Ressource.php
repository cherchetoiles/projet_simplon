<?php
class Ressource
{
    private int $ressource_id;
    private string $content;
    private int $lesson_id;

    public function createRessourceToInsert($content,$lesson_id){
        $this->content=$content;
        $this->lesson_id=$lesson_id;
        return TRUE;
    }
}
?>