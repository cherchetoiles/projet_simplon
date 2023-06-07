<?php
class User_repo extends Connect_bdd{

    public function __construct(){
        parent::__construct();
    }

    // function getUserById($idUser){
    //     $req = $this->bdd->prepare('SELECT * FROM user WHERE user_id = ?');
    //     $req->execute([$idUser]);
    //     $data = $req->fetch();
    //     $user = new User();
    //     $user->createUserFromQuery($data);
    //     return $user;
    // }

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
        $req=$this->bdd->prepare('INSERT INTO user SET user_name=?,user_surname=?,user_email=?,user_password=?,user_statut=1,user_token=?,user_company=" ",user_phone=" ",user_description=" ",user_linkedin=" ",user_github=" ",user_avatar="random.png",role_id=2,speciality_id=1');
        recurBind($req,[$user->getUserName(),$user->getUserSurname(),$user->getUserEmail(),$user->getUserPassword(),kodex_random_string(26)],5);
        $req->execute();
        $user=$req->fetch();
    }

    function getLessonsByUser($user){
        $req = 'SELECT * FROM lesson l JOIN category cat ON cat.category_id=l.category_id WHERE user_id =? ';
        $req = $this->bdd->prepare($req);
        $req->execute([$user]);
        $result = $req->fetchAll();
        $lessons = [];
        foreach($result as $queryresult){
            $lesson = new Lesson();
            $lesson->createLessonFromQuery($queryresult);
            $lessons[] = $lesson;
        } 

        return $lessons;
    }

    function getFavLesson($user,$option=[]){
        $req = 'SELECT * FROM bookmark b JOIN lesson l ON l.lesson_id = b.lesson_id WHERE b.user_id =?';
        if(isset($option['lesson_id'])){
            $req= ' AND l.lesson_id = option[$lesson_id]';
        }
        $req = $this->bdd->prepare($req);
        $req->execute([$user]);
        $result = $req->fetchAll();
        $fav_lessons = [];
        foreach ($result as $queryresult){
            $fav_lesson = new Lesson();
            $fav_lesson->createLessonFromQuery($queryresult);
            $fav_lessons[] = $fav_lesson;
        }
        return $fav_lessons;
    }
    
    function addFavLesson($user,$lesson_id){
        $req = 'INSERT INTO bookmark (user_id,lesson_id) VALUES (?,?)';
        $req = $this->bdd->prepare($req);
        $req->execute([$user->getUserId(),$lesson_id]);
    }

    function deleteFavLesson($user,$lesson_id) {
        $req = 'DELETE FROM bookmark WHERE user_id=? AND lesson_id=?';
        $req = $this->bdd->prepare($req);
        $req->execute([$user->getUserId(),$lesson_id]);
    }

    function getFinishLesson($user){
        $req = 'SELECT * FROM finish f JOIN lesson l ON f.lesson_id = l.lesson_id WHERE f.user_id=?';
        $req = $this->bdd->prepare($req);
        $req->execute([$user]);
        $result = $req->fetchAll();
        $finish_lessons = [];
        foreach ($result as $queryresult){
            $finish_lesson = new Lesson();
            $finish_lesson->createLessonFromQuery($queryresult);
            $finish_lessons[] = $finish_lesson;
        }
        return $finish_lessons;       
    }
    function updateUserData($user){
        if (!$this->getUserByEmail($user->getUserEmail())){
            $req = 'UPDATE user u SET u.user_email = ? WHERE u.user_id = ?';
            $req = $this->bdd->prepare($req);
            $req->execute([$user->getUserEmail(),$user->getUserId()]);
        }
    }
    function updatePassword($password,$userId){
        $req = 'UPDATE user u SET u.user_password = ?  WHERE u.user_id = ?';
        $req = $this->bdd->prepare($req);
        $password = password_hash($password,PASSWORD_BCRYPT);
        $req->execute([$password,$userId]);
    }
    function updateEmail($email,$userId){
        $req = 'UPDATE user u SET u.user_email = ?  WHERE u.user_id = ?';
        $req = $this->bdd->prepare($req);
        $req->execute([$email,$userId]);
    }

    function updateAvatar($file,$user) {
        // Vérifier si un fichier a été téléchargé avec le nom "profile_photo"
        if (isset($file['profile_photo'])) {
            // Récupérer les informations sur le fichier téléchargé
            $fileName = uniqid().".".explode("/",$file['profile_photo']['type'])[1];
            $fileTmp = $file['profile_photo']['tmp_name'];

            // Déplacer le fichier vers le répertoire de destination souhaité
            $destination = 'assets/img/user_avatar/' . $fileName;
            if (move_uploaded_file($fileTmp, $destination)) {
            // Effectuer les opérations de base de données pour mettre à jour la nouvelle photo de profil
            // Assurez-vous d'avoir une connexion à la base de données établies
                $updateQuery = "UPDATE user SET user_avatar = ? WHERE user_id = ?";
                $updateQuery = $this->bdd->prepare($updateQuery);
                $updateQuery->execute([$fileName,$user->getUserId()]);
                $user->setUserAvatar($fileName);

                // Envoyer une réponse JSON pour indiquer le succès
                $response = ['success' => true, 'message' => 'The profile picture has been updated.','new_file'=>"assets/img/user_avatar/".$fileName];
                return json_encode($response);
            } else {
            // Le déplacement du fichier a échoué
            $response = ['success' => false, 'message' => 'Error moving the uploaded file.'];
            return json_encode($response);
            }
        } else {
            // Aucun fichier n'a été téléchargé
            $response = ['success' => false, 'message' => 'No file uploaded.'];
            return json_encode($response);
        }
;
        }
}
?>