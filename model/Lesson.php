<?php
class Lesson
{
    private int $lesson_id;
    private string $lesson_title;
    private string $lesson_description;
    private string $lesson_level;
    private string $lesson_cover;
    private string $lesson_attract_title;
    private string $lesson_date;
    private string $lesson_content;
    private array $lesson_ressources;
    private int $lesson_views;
    private int $lesson_likes;
    private int $category_id;

    public function createLessonToInsert($lesson_title,$lesson_description,$lesson_level,$lesson_attract_title,$lesson_content,$category_id,$cover_type,$content_type){
        $this->lesson_title = $lesson_title;
        $this->lesson_description = $lesson_description;
        $this->lesson_level = $lesson_level;
        $this->lesson_cover = uniqid().".".$cover_type;
        $this->lesson_content = uniqid().".".$content_type;
        $this->lesson_attract_title = $lesson_attract_title;
        $this->category_id = $category_id;
    }

    public function getLessonContent(){
        return $this->lesson_content;
    }

    public function getLessonTitle(){
        return $this->lesson_title;
    }

    public function getLessonDescription(){
        return $this->lesson_description;
    }

    public function getLessonCover(){
        return $this->lesson_cover;
    }

    public function getLessonAttractTitle(){
        return $this->lesson_attract_title;
    }

    public function getLessonCategoryId(){
        return $this->category_id;
    }

    public function verifyLesson($cover_size,$cover_type,$video_size,$video_type){
        if (strlen($this->lesson_title)>63){
            return "titre trop long";
        }
        if ($this->lesson_title===""){
            return "mettez un titre";
        }
        if (strlen($this->lesson_attract_title)>127){
            return "titre de mise en avant trop long";
        }
        if (!in_array($this->lesson_level,[1,2,3,4,5,6,7,8,9])){
            return "Merci de ne pas modifier les valeurs des choix de proposition";
        }
        if ($cover_type=="wrong"){
            return "Mettez une miniature";
        }
        if ($video_type=="wrong"){
            return "mettez une vidéo";
        }
        if ($cover_size>MAX_IMG_SIZE){
            return "Miniature trop lourde";
        }
        if (!in_array($cover_type,VALID_IMG_TYPE)){
            return "Mauvais type de fichier de miniature";
        }
        if ($video_size>MAX_VIDEO_SIZE){
            return "Vidéo trop lourde";
        }
        if (!in_array($video_type,VALID_VIDEO_TYPE)){
            return "Mauvais type de fichier de vidéo";
        }
        
        return "True";
    }
}
?>
