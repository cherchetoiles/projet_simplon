<?php
class Ressource_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    public function insertRessourceIntoBdd(Ressource $ressource){
        $sql="INSERT INTO ressource SET content=?, ressource_name=?";
        $req=$this->bdd->prepare($sql);
        $ressourceContent=$ressource->getRessourceContent();
        $ressourceName=$ressource->getRessourceName();
        $req->bindParam(1,$ressourceContent);
        $req->bindParam(2,$ressourceName);
        return $req->execute();
    }
}
?>