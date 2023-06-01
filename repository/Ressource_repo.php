<?php
class Ressource_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function insertRessourceIntoBdd(Ressource $ressource){
        $sql="INSERT INTO ressource SET content=?, ressource_name=?, lesson_id=?";
        $req=$this->bdd->prepare($sql);
        $ressourceContent=$ressource->getRessourceContent();
        $ressourceName=$ressource->getRessourceName();
        $lesson_id=$ressource->getRessourceLessonId();
        $req->bindParam(1,$ressourceContent);
        $req->bindParam(2,$ressourceName);
        $req->bindParam(3,$lesson_id);
        return $req->execute();
    }
}
?>