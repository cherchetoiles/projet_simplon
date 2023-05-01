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
        $req=prepare($this->bdd,$sql);
        $req->bindParam(1,$lesson->title);
        $req->bindParam(2,$lesson->description);
        $req->bindParam(3,$lesson->cover);
        $req->bindParam(4,$lesson->attract_title);
        $req->bindParam(5,$lesson->attract_content);
        $req->execute();
        //rajouter l'insertions des ressources
    }
}
?>