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

    public function getRessourcesByLessonId(int $lesson_id){
        function callback($query){
            $tmpRessource = new Ressource();
            $tmpRessource->createRessourceFromQuery($query);
            return $tmpRessource;
        }
        $sql="SELECT * FROM ressource WHERE lesson_id=?";
        $req=$this->bdd->prepare($sql);
        $req->bindParam(1,$lesson_id);
        $req->execute();
        $result=$req->fetchAll(PDO::FETCH_ASSOC);
        if (!$result){
            return [];
        } 
        return array_map("callback",$result);
    }
}
?>