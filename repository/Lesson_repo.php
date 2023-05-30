
<?php
class Lesson_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function insertLessonIntoBdd(Lesson $lesson){
        $sql="INSERT INTO lesson SET lesson_title=?, lesson_description=?, lesson_content=?, lesson_cover=?, lesson_attract_title=?, lesson_date=?, category_id=?";
        $req=$this->bdd->prepare($sql);
        recurBind($req,[$lesson->getLessonTitle(),$lesson->getLessonDescription(),$lesson->getLessonContent(),$lesson->getLessonCover(),$lesson->getLessonAttractTitle(),date("Y-m-d H:i:s"),$lesson->getLessonCategoryId()],7);
        $req->execute();
        return true;
    }

    public function getMaxLessonId(){
        $sql="SELECT MAX(lesson_id) FROM lesson";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}
?>
