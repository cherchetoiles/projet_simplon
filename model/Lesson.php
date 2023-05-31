<?php
class Lesson
{
    private int $lesson_id;
    private string $lesson_title;
    private string $lesson_description;
    private int $lesson_difficult;
    private string $lesson_cover;
    private string $lesson_attract_title;
    private string $lesson_date;
    private string $lesson_content;
    private array $lesson_ressources;
    private int $lesson_views;
    private int $lesson_likes;
    private int $category_id;
    private int $user_id;

    public function getLessonCover(){
        return $this->lesson_cover;
    }

    public function getLessonTitle(){
        return $this->lesson_title;
    }

    public function getLessonLikes(){
        return $this->lesson_likes;
    }

    public function getLessonViews(){
        return $this->lesson_views;
    }

    public function getLessonDifficult(){
        return $this->lesson_difficult;
    }

    function createLessonFromQuery($query){
        if (isset($query['lesson_id'])){
            $this->lesson_id = $query['lesson_id'];
        }
        if (isset($query['lesson_title'])){
            $this->lesson_title = $query['lesson_title'];
        }
        if (isset($query['lesson_description'])){
            $this->lesson_description = $query['lesson_description'];
        }
        if (isset($query['lesson_difficult'])){
            $this->lesson_difficult = $query['lesson_difficult'];
        }
        if (isset($query['lesson_content'])){
            $this->lesson_content = $query['lesson_content'];
        }
        if (isset($query['lesson_cover'])){
            $this->lesson_cover = $query['lesson_cover'];
        }
        if (isset($query['lesson_attract_title'])){
            $this->lesson_attract_title = $query['lesson_attract_title'];
        }
        if (isset($query['lesson_date'])){
            $this->lesson_date = $query['lesson_date'];
        }
        if (isset($query['category_id'])){
            $this->category_id = $query['category_id'];
        }
        if (isset($query['user_id'])){
            $this->user_id = $query['user_id'];
        }
        if (isset($query['views'])){
            $this->lesson_views = $query['views'];
        }
        if (isset($query['fav'])){
            $this->lesson_likes = $query['fav'];
        }
        if (isset($query['lesson_attract_title'])){
            $this->lesson_attract_title = $query['lesson_attract_title'];
        }
    }


}
?>
