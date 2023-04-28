<?php
class User
{
    public $user_id;
    public $user_name;
    public $user_surname;
    public $user_email;
    public $user_password;
    public $user_statut;
    public $user_token;
    public $user_avatar;
    public $role_nom;
    public $speciality_name;

    public function connectUser(){
        $_SESSION['user']=$this;
    }

    public function createUserFromQuery($queryResult){
        $this->user_id=$queryResult['user_id'];
        $this->user_name=$queryResult['user_name'];
        $this->user_surname=$queryResult['user_surname'];
        $this->user_email=$queryResult['user_email'];
        $this->user_password=$queryResult['user_password'];
        $this->user_statut=$queryResult['user_statut'];
        $this->user_avatar=$queryResult['user_avatar'];
        $this->role_nom=$queryResult['role_nom'];
        $this->speciality_name=$queryResult['speciality_name'];
    }
}


?>