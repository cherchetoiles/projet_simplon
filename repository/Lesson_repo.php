
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
            lesson.lesson_id,lesson_title,lesson_description,lesson_cover,lesson_date,lesson_difficult,
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
    }

    public function insertLessonIntoBdd(Lesson $lesson){
        $sql="INSERT INTO lesson SET lesson_title=?, lesson_description=?, lesson_content=?, lesson_cover=?, lesson_attract_title=?, lesson_date=?, category_id=?,user_id=?";
        $req=$this->bdd->prepare($sql);
        recurBind($req,[$lesson->getLessonTitle(),$lesson->getLessonDescription(),$lesson->getLessonContent(),$lesson->getLessonCover(),$lesson->getLessonAttractTitle(),date("Y-m-d H:i:s"),$lesson->getLessonCategoryId(),$lesson->getLessonUserId()],8);
        $req->execute();
        return true;
    }

    /**
        retourne les leçons les plus populaires des deux dernières semaines
        @param array $option support limit, offset, category_id, theme_id
        @return Array liste des leçons les plus populaires
        */
    public function getLesson(string $orderBy,array $option = []){

        function callback($query){
            $tmpLesson=new Lesson();
            $tmpLesson->createLessonFromQuery($query);
            $tmpCategory=new Category;
            $tmpCategory->createCategoryFromQuery($query);
            $tmpUser=new User;
            $tmpUser->createUserFromQuery($query);
            return ["lesson"=>$tmpLesson,"category"=>$tmpCategory,"user"=>$tmpUser];
        }
      $sql="SELECT  l.lesson_id, l.lesson_title, l.lesson_content, l.lesson_cover,l.lesson_attract_title,l.lesson_difficult,
                    c.category_id,c.category_logo,c.category_name,
                    u.user_name,u.user_surname,u.user_avatar,s.speciality_name
            FROM lesson l
            LEFT JOIN (SELECT l.lesson_id,count(DISTINCT f.user_id) AS favorite,count(DISTINCT w.user_id) AS views
                    FROM lesson l 
                    INNER JOIN watch w ON l.lesson_id = w.lesson_id 
                    INNER JOIN fav f ON l.lesson_id = f.lesson_id
                    INNER JOIN category c ON l.category_id = c.category_id ) total ON l.lesson_id = total.lesson_id
            NATURAL JOIN category c 
            NATURAL JOIN user u
            NATURAL JOIN speciality s";

    if (isset($option["category_id"])){
     $sql.=" WHERE l.category_id = ".$option["category_id"]." ";
     }
    if (isset($option["lesson_id"])){
     $sql.=" WHERE l.lesson_id = ".$option["lesson_id"]." ";
     }

     if (isset($option["theme_id"])){
        $sql.='WHERE c.category_id = '.$option["theme_id"].' ';
     }
     $sql.=" ORDER BY ".$orderBy;

    if (isset($option["limit"])){
     $sql.=" LIMIT ".$option["limit"];
        if (isset($option["offset"])){
     $sql.=" OFFSET ".$option["offset"];
     }
     }
    $req=$this->bdd->prepare($sql);
    $req->execute();
    return array_map("callback",$req->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getMaxLessonId(){
        $sql="SELECT MAX(lesson_id) FROM lesson";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}
?>
