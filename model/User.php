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

    public function cryptUserPassword(){
        $this->user_password=password_hash($this->user_password,PASSWORD_BCRYPT);
    }

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
        if (!password_verify($_POST['your_pass'],$this->getUserPassword())){
            var_dump($this->getUserPassword());
            return "uncorrectPassword";
        }
        return "True";
    }
}
?>