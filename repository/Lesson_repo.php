
<?php
class Lesson_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function getLessonRequest(){
        $sql = "SELECT l.lesson_id,lesson_title,lesson_description,lesson_content,lesson_cover,lesson_date,
                    user_name,user_surname,user_avatar,
                    category_logo
                    FROM lesson l 
                        NATURAL JOIN user u  
                        NATURAL JOIN speciality s
                        NATURAL JOIN category  c
                    WHERE lesson_status = 0";

        $req = $this->bdd->prepare($sql);
        $req -> execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getLessonByTitle($keywords){
        $searchTitle = implode(" AND ", 
                                array_map(function($keyword) {
                                    return "l.lesson_title LIKE '%" . $keyword . "%'";
                                }, $keywords));

        $sql = "SELECT l.lesson_id, l.lesson_title, l.lesson_cover,l.lesson_difficult, c.category_logo 
        FROM lesson l
            INNER JOIN category c ON c.category_id = l.category_id
            LEFT JOIN fav f ON l.lesson_id = f.lesson_id
            LEFT JOIN watch w on l.lesson_id = w.lesson_id
            LEFT JOIN (SELECT l.lesson_id,count(DISTINCT f.user_id) AS favorite,count(DISTINCT w.user_id) AS views
                    FROM lesson l 
                    INNER JOIN watch w ON l.lesson_id = w.lesson_id 
                    INNER JOIN fav f ON l.lesson_id = f.lesson_id) total ON l.lesson_id = total.lesson_id
        WHERE l.lesson_status = 1 AND " . $searchTitle ."
            ORDER BY total.views/total.favorite DESC
            LIMIT 5
        ";

        $req = $this->bdd->prepare($sql);

        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getLessonByCategoryId($category_id,$option = []){
        $sql = "SELECT lesson_id,lesson_title,lesson_description,lesson_content,lesson_difficult 
                FROM lesson 
                WHERE category_id = ? AND lesson_status = 1
                ORDER BY lesson_difficult";
        if (isset($option['limit'])){
            $sql.=" LIMIT $option[limit]";
        }
        $req = $this->bdd->prepare($sql);
        $req->bindParam(1,$category_id);
        $req->execute();
        $lessons = $req->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        foreach ($lessons as $lesson){
            $tmpLesson = new Lesson();
            $tmpLesson->createLessonFromQuery($lesson);
            $lessons[$i]=$tmpLesson;
            $i++;
        }
        return $lessons;
    }

    public function updateLessonStatus($lesson_id,$newStatus){
        if ($newStatus===1 | $newStatus===0){
            $sql = "UPDATE lesson SET lesson_status = ? WHERE lesson_id = ?";
            $req = $this->bdd->prepare($sql);
            $req->bindParam(1,$newStatus);
            $req->bindParam(2,$lesson_id);
            if ($req->execute()){
                return ["success"=>TRUE];
            }
        }
        return ["success"=>FALSE];
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
            category_name,category.category_id,category_logo ";
        $sql.="FROM lesson ";
        $sql.="LEFT JOIN user ON lesson.user_id = user.user_id ";
        $sql.="LEFT JOIN category ON lesson.category_id = category.category_id ";
        $sql.="LEFT JOIN watch ON lesson.lesson_id = watch.lesson_id ";
        $sql.="LEFT JOIN fav ON lesson.lesson_id = fav.lesson_id ";
        if (isset($_GET['action'])){
            if ($_GET['action']=="nos_cours"){
                $sql.="WHERE lesson.lesson_status = 1 ";
            }
        }
        $sql.="GROUP BY lesson_id";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        $result=$req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activateOnMap",$result);
    }

    public function insertLessonIntoBdd(Lesson $lesson){
        $sql="INSERT INTO lesson SET lesson_title=?, lesson_description=?, lesson_difficult=?, lesson_content=?, lesson_cover=?, lesson_attract_title=?, lesson_date=?, category_id=?,user_id=?";
        $req=$this->bdd->prepare($sql);
        recurBind($req,[$lesson->getLessonTitle(),$lesson->getLessonDescription(),$lesson->getLessonDifficult(),$lesson->getLessonContent(),$lesson->getLessonCover(),$lesson->getLessonAttractTitle(),date("Y-m-d H:i:s"),$lesson->getLessonCategoryId(),$lesson->getLessonUserId()],9);
        $req->execute();
        return true;
    }

    public function deleteLessonFromBdd($id){
        $sql="DELETE FROM bookmark WHERE lesson_id=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$id);
        if (!$req->execute()){
            return false;
        }
        $sql="DELETE FROM watch WHERE lesson_id=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$id);
        if (!$req->execute()){
            return false;
        }
        $sql="DELETE FROM fav WHERE lesson_id=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$id);
        if (!$req->execute()){
            return false;
        }
        $sql="DELETE FROM lesson WHERE lesson_id=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$id);
        if (!$req->execute()){
            return false;
        }
        return true;
    }

    /**
        retourne les leçons les plus populaires des deux dernières semaines
        @param array $option support limit, offset, category_id, theme_id, lesson_id, withcategorieslessons(bool)
        @return Array liste des leçons avec les paramètres
        */
    public function getLesson(string $orderBy,array $option = []){
        if (!function_exists("callback_getlesson"))
        {function callback_getlesson($query){
            $tmpLesson=new Lesson();
            $tmpLesson->createLessonFromQuery($query);
            $tmpCategory=new Category;
            $tmpCategory->createCategoryFromQuery($query);
            $tmpUser=new User;
            $tmpUser->createUserFromQuery($query);
            return ["lesson"=>$tmpLesson,"category"=>$tmpCategory,"user"=>$tmpUser];}
        }
      $sql="SELECT  l.lesson_id, l.lesson_title, l.lesson_description,  l.lesson_content, l.lesson_cover,l.lesson_attract_title,l.lesson_difficult,total.fav,
                    c.category_id,c.category_logo,c.category_name,
                    u.user_name,u.user_surname,u.user_avatar,s.speciality_name
            FROM lesson l
            LEFT JOIN (SELECT l.lesson_id,count(DISTINCT f.user_id) AS fav,count(DISTINCT w.user_id) AS views
                    FROM lesson l 
                    LEFT JOIN watch w ON l.lesson_id = w.lesson_id 
                    LEFT JOIN fav f ON l.lesson_id = f.lesson_id
                    LEFT JOIN category c ON l.category_id = c.category_id ) total ON l.lesson_id = total.lesson_id
            NATURAL JOIN category c 
            NATURAL JOIN user u
            NATURAL JOIN speciality s
            WHERE l.lesson_status = 1 ";

    if (isset($option["category_id"])){
     $sql.="AND l.category_id = ".$option["category_id"]." ";
     }
    if (isset($option["lesson_id"])){
     $sql.="AND l.lesson_id = ".$option["lesson_id"]." ";
     }
     if (isset($option["theme_id"])){
        $sql.='AND c.category_id = '.$option["theme_id"].' ';
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
    return array_map("callback_getlesson",$req->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getMaxLessonId(){
        $sql="SELECT MAX(lesson_id) FROM lesson";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function getLessonLikeByUserId($lesson_id,$user_id){
        $sql="SELECT * FROM fav WHERE lesson_id=? AND user_id=?";
        $req = $this->bdd->prepare($sql);
        $req->bindParam(1,$lesson_id);
        $req->bindParam(2,$user_id);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>
