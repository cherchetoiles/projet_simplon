
<?php
class Lesson_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function getAllLessonFull(){
        function activateOnMap($query){
            $tmpLesson=new Lesson();
            $tmpLesson->createLessonFromQuery($query);
            $tmpUser=new User();
            $tmpUser->createUserFromQuery($query);
            $tmpCategory=new Category();
            $tmpCategory->createCategoryFromQuery($query);
            return ["lesson"=>$tmpLesson,"user"=>$tmpUser,"category"=>$tmpCategory];
        };
        $sql="SELECT 	
            count(distinct(watch.user_id)) as views,
		    count(distinct(fav.user_id)) as fav,
            lesson.lesson_id,lesson_title,lesson_cover,lesson_date,lesson_difficult,
            user.user_id,user_name,user_surname,user_avatar,
            category_name,category.category_id ";
        $sql.="FROM lesson ";
        $sql.="LEFT JOIN user ON lesson.user_id = user.user_id ";
        $sql.="LEFT JOIN category ON lesson.category_id = category.category_id ";
        $sql.="LEFT JOIN watch ON lesson.lesson_id = watch.lesson_id ";
        $sql.="LEFT JOIN fav ON lesson.lesson_id = fav.lesson_id ";
        $sql.="GROUP BY lesson_id";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        $result=$req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activateOnMap",$result);

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
