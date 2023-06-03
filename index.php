<?php
require_once('controller/homecontroller.php');
session_start();
if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    if(!empty($_SESSION['user'])){
        switch($_GET['action']) {
            case 'homepage':
                homepage();
                break;
    
            case 'nos_cours':
                nos_cours();
                break;
        
            case 'profil':
                profil();
                break;
                
            case 'cours':
                cours();
                break;

            case 'lesson':
                lesson();
                break;

            case 'logout':
                logout();
                break;

            case 'favTreat':
                FavLesson();
                break;

            case 'unFavTreat':
                UnFavLesson();
                break;
            
            case 'test':
                modaltest();
                break;
                
            default:
                if($_SESSION['user']->getRoleNom() == 'creator' || $_SESSION['user']->getRoleNom() == 'admin')
                {
                    switch($_GET['action']) {
                        
                        case 'addVideo':
                            formVideo();
                            break;
                        
                        case 'addVideoTreat':
                            addVideo();
                            break; 
                        
                        default:
                            homepage();
                        }  
                } else{
                homepage();
                }
                break;     
        }
    

        // }else{
        //     switch($_GET['action']){
                        
        //         case 'ModelPremierVue':
        //             modaltest();
        //             break;

        //         default:
        //             homepage();
        //             break;
        //     }
                
        // }

    }else{
        switch($_GET['action']) {
            case 'signup':
                signup();
                break; 
    
            case 'signup_treat':
                signup_treat();
                break;
    
            case 'signin_treat':
                signin_treat();
                break;

            default:
                signin();
                break;
        }
    }
}else{
    if(isset($_GET['admin']) && (!empty($_SESSION) && $_SESSION['user']->getRoleNom() == 'admin')){
        switch($_GET['admin']) {
            case 'addTheme':
                addTheme();
                break;

            case 'addThemeTreat':
                addThemeTreat();
                break; 
    
            case 'crud':
                crud();
                break;

            default:
                homepage();
                break;
        }
    }else{         
        signin();
    }
        
}

?>