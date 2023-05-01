<?php
class Lesson
{
    public int $lesson_id;
    public string $lesson_title;
    public string $lesson_description;
    public string $lesson_level;
    public string $lesson_cover;
    public string $lesson_attract_title;
    public string $lesson_date;
    public string $lesson_content;
    public array $lesson_ressources;
    public int $lesson_views;
    public int $lesson_likes;
    public int $category_id;
    
    function createLessonToInsert($lesson_title,$lesson_content,$lesson_description,$lesson_cover,$lesson_attract_title,$lesson_ressources,$category_id){
        $this->lesson_title=$lesson_tile;
        $this->lesson_description=$lesson_description;
        $this->lesson_cover=$lesson_cover;
        $this->lesson_content=$lesson_content;
        $this->lesson_attract_title=$lesson_attract_title;
        $this->lesson_ressources=$lesson_ressources;
        $this->category_id=$category_id;
        return TRUE;
    }
}
?>
