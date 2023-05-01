<?php
class Lesson_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function insertLessonIntoBdd(Lesson $lesson){
        $sql="INSERT INTO lesson SET lesson_title=?";
        $sql=$sql.",lesson_description=?";
        $sql=$sql.",lesson_cover=?";
        $sql=$sql.",lesson_attract_title=?";
        $sql=$sql.",lesson_content=?";
        $sql=$sql.",category_id=?";
        $req=prepare($this->bdd,$sql);
        $req->bindParam(1,$lesson->title);
        $req->bindParam(2,$lesson->description);
        $req->bindParam(3,$lesson->cover);
        $req->bindParam(4,$lesson->attract_title);
        $req->bindParam(5,$lesson->attract_content);
        $req->bindParam(6,$lesson->category_id);
        $req->execute();
        $sql="SELECT lesson_id FROM lesson ORDER BY lesson_id DESC LIMIT 1";
        $req=prepare($this->bdd,$sql);
        $req->execute();
        $tmpLesson=$req->fetch(PDO:FETCH_ASSOC);
        $ressource_repo=new Ressource_repo();
        foreach ($lesson->lesson_ressources as $ressource){
            $tmpRessource=new Ressource();
            $tmpRessource->createRessourceToInsert($ressource,$lesson->tmpLesson_id)
            $ressource_repo->insertRessourceIntoBdd($tmpRessource);
        }
        return TRUE;
    }
}
?>