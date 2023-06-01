<?php
class User
{
    private $user_id;
    private $user_name;
    private $user_surname;
    private $user_email;
    private $user_password;
    private $user_statut;
    private $user_token;
    private $user_avatar;
    private $user_views;
    private $user_likes;
    private $user_nb_lesson;
    private $role_nom;
    private $speciality_name;


    public function getUserName(){
        return $this->user_name;
    }

    public function getUserSurname(){
        return $this->user_surname;
    }

    public function getUserEmail(){
        return $this->user_email;
    }

    public function getUserPassword(){
        return $this->user_password;
    }

    public function getUserAvatar(){
        return $this->user_avatar;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getUserViews(){
        return $this->user_views;
    }

    public function getUserLikes(){
        return $this->user_likes;
    }

    public function getUserNbLesson(){
        return $this->user_nb_lesson;
    }

    public function getUserSpe(){
        return $this->speciality_name;
    }

    public function cryptUserPassword(){
        $this->user_password=password_hash($this->user_password,PASSWORD_BCRYPT);
    }

    public function connectUser(){
        $_SESSION['user']=$this;
    }

    public function createUserFromQuery($queryResult){
        if (isset($queryResult['user_id'])){
            $this->user_id=$queryResult['user_id'];
        }
        if (isset($queryResult['user_name'])){
            $this->user_name=$queryResult['user_name'];
        }
        if (isset($queryResult['user_surname'])){
            $this->user_surname=$queryResult['user_surname'];
        }
        if (isset($queryResult['user_email'])){
            $this->user_email=$queryResult['user_email'];
        }
        if (isset($queryResult['user_password'])){
            $this->user_password=$queryResult['user_password'];
        }
        if (isset($queryResult['user_statut'])){
            $this->user_statut=$queryResult['user_statut'];
        }
        if (isset($queryResult['user_avatar'])){
            $this->user_avatar=$queryResult['user_avatar'];
        }
        if (isset($queryResult['views'])){
            $this->user_views=$queryResult['views'];
        }
        if (isset($queryResult['fav'])){
            $this->user_likes=$queryResult['fav'];
        }
        if (isset($queryResult['nb_lesson'])){
            $this->user_nb_lesson=$queryResult['nb_lesson'];
        } 
        if (isset($queryResult['role_nom'])){
            $this->role_nom=$queryResult['role_nom'];
        } 
        if (isset($queryResult['speciality_name'])){
            $this->speciality_name=$queryResult['speciality_name'];
        }
    }

    public function setUserTotalViews(){
        $sql="SELECT SUM(nb_vue) as total_vue FROM(SELECT COUNT(DISTINCT w.user_id) as nb_vue FROM lesson l 
        INNER JOIN watch w ON l.lesson_id = w.lesson_id
        WHERE l.user_id = ".$this->user_id."
        GROUP BY l.lesson_id) as views";
        $repo=new User_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->user_views=0;
        }
        else{
            $this->user_views=intval($reqResult);
        }
    }

    public function setUserTotalLikes(){
        $sql="SELECT SUM(nb_like) as total_like FROM(SELECT COUNT(DISTINCT f.user_id) as nb_like FROM lesson l 
        INNER JOIN fav f ON l.lesson_id = f.lesson_id
        WHERE l.user_id = ".$this->user_id."
        GROUP BY l.lesson_id) as likes";
        $repo=new User_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->user_likes=0;
        }
        else{
            $this->user_likes=intval($reqResult);
        }
    }

    public function setUserNbLesson(){
        $sql="SELECT COUNT(DISTINCT lesson_id) as nb_lesson FROM lesson WHERE user_id=".$this->user_id;
        $repo=new User_repo();
        $req=$repo->bdd->prepare($sql);
        $req->execute();
        $reqResult=$req->fetch(PDO::FETCH_NUM)[0];
        if (!$reqResult){
            $this->user_nb_lesson=0;
        }
        else{
            $this->user_nb_lesson=intval($reqResult);
        }
    }

    public function createUserToSignup($email,$name,$surname,$pass){
        $this->user_email=$email;
        $this->user_surname=$surname;
        $this->user_name=$name;
        $this->user_password=$pass;
    }

    public function verifUserToSignup($repass,$repo,$agree_term){
        if (empty($this->user_email)){
            return "email";
        }
        if (!filter_var($this->user_email,FILTER_VALIDATE_EMAIL)){
            return "email";
        }
        elseif (empty($this->user_name)){
            return "name";
        }
        elseif (empty($this->user_surname)){
            return "surname";
        }
        elseif ($repo->getUserByEmail($this->user_email)){
            return "emailreadyused";
        }
        elseif(empty($this->user_password) || $this->user_password!=$repass || !preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$this->user_password)){
            return "mdp";
        }
        elseif (!$agree_term){
            return "unacceptedagreeterm";
        }
        else {return "True";}
    }

    function verifUserToSignin($pass){
        if (!$this->user_statut==1){
            return "unactiveUser";
        }
        if (!password_verify($pass,$this->getUserPassword())){
            return "uncorrectPassword";
        }
        return "True";
    }
}
?>