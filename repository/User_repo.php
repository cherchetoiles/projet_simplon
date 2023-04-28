<?php
class UserRepository extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    function getUserByEmail($email){
        $req=$this->bdd->prepare('SELECT user_id,user_name,user_email,user_surname,user_password,user_statut,user_token,user_avatar,role_nom,speciality_name FROM user u NATURAL JOIN role LEFT JOIN speciality s ON s.id_speciality = u.id_speciality  WHERE user_email=?');
        $req->bindParam(1,$email);
        $req->execute();
        $tmpUser=$req->fetch();
        return $tmpUser;
    }

    function insertUserIntoBdd($user){
        $req=$this->bdd->prepare('INSERT INTO user SET user_name=?,user_surname=?,user_email=?,user_password=?,user_statut=0,user_token=?,user_company=none,user_phone=none,user_description=none,user_linkedin=none,user_github=none,user_avatar=none,role_id=1,speciality_id=none');
        recurBind($req,[$user->user_email,$user->user_surname,$user->user_email,$user->user_password,kodex_random_string(26)],5);
        $req->execute();
        $tmpUser=$req->fetch();
    }
}


?>