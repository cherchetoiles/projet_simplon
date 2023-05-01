<?php
class Ressource_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function insertRessourceIntoBdd(Ressource $ressource){
        $sql="INSERT INTO ressource ";
        $sql=$sql."SET content=?";
        $sql=$sql.",SET lesson_id=?";
        $req=prepare($this->bdd,$sql);
        $req->bindParam(1,$ressource->content);
        $req->bindParam(2,$ressource->lesson_id);
        $req->execute();
        return TRUE;
    }
}
?>