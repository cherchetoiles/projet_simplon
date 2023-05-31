<?php
class User_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    function getAllUserFull(){
        $sql="";
    }

    function getUserByEmail($email){
        $req=$this->bdd->prepare('SELECT user_id,user_name,user_email,user_surname,user_password,user_statut,user_token,user_avatar,role_nom,speciality_name FROM user u NATURAL JOIN role LEFT JOIN speciality s ON s.speciality_id = u.speciality_id  WHERE user_email=?');
        $req->bindParam(1,$email);
        $req->execute();
        $tmpUser=$req->fetch();
        return $tmpUser;
    }

    function insertUserIntoBdd($user){
        $req=$this->bdd->prepare('INSERT INTO user SET user_name=?,user_surname=?,user_email=?,user_password=?,user_statut=1,user_token=?,user_company=" ",user_phone=" ",user_description=" ",user_linkedin=" ",user_github=" ",user_avatar=" ",role_id=2,speciality_id=1');
        recurBind($req,[$user->getUserName(),$user->getUserSurname(),$user->getUserEmail(),$user->getUserPassword(),kodex_random_string(26)],5);
        $req->execute();
        $user=$req->fetch();
    }
}

?>