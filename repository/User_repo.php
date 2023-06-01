<?php
class User_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    function getAllUserFull(){
        function activateOnMap($query){
            $tmpUser=new User();
            $tmpUser->createUserFromQuery($query);
            $tmpUser->setUserTotalViews();
            $tmpUser->setUserTotalLikes();
            $tmpUser->setUserNbLesson();
            return $tmpUser;
        };
        $sql="SELECT u.user_id,u.user_name,u.user_surname,u.user_email,u.user_avatar,s.speciality_name
        FROM user u
        INNER JOIN speciality s ON u.speciality_id = s.speciality_id";
        $req=$this->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetchAll(PDO::FETCH_ASSOC);
        return array_map("activateOnMap",$reqResult);
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