<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="dist/output.css" rel="stylesheet">
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>test</title>
    
</head>
<body class="w-full h-auto">
<?php 
    $user=$_SESSION['user'];    
?>
<!-- MODAL FOR UPDATE PROFIL DATA -->
<div class="flex flex-col-reverse w-full p-5 mx-auto border border-solid-2 lg:w-10/12 lg:h-9/12 lg:flex-row font-body lg:shadow-lg border-stroke lg:rounded-2xl ">
    <!-- MENU -->
    <div class="flex flex-col h-auto  lg:border-r justify-start lg:border-solid lg:w-1/4 border-[#C8C8C8] lg:my-10">
        <div class="flex text-[10px] mx-auto lg:text-xl lg:border-b lg:border-solid border-[#C8C8C8] lg:px-12 lg:flex-col text-gray-dark ">
            <a href="" class="hidden mt-2 font-normal lg:flex text-red">Modification du profil</a>
            <a href="" class="mr-2 font-normal lg:mr-0 lg:my-7">Politique de cookies</a>    
            <span class="font-normal lg:hidden">-</span>
            <a href="" class="ml-2 font-normal lg:ml-0 lg:mb-10">Politique de confidentialités</a>
        </div>
        <a href="?action=creatorperm" class="flex justify-center mt-4 text-sm font-semibold leading-5 text-center lg:mx-9 text-red lg:text-gray-dark lg:text-xl">Envie de devenir Créateur ?<br> Rejoins notre équipe !</a>
    </div>
    <!-- PROFILUPDATE -->
    <div class="mx-auto lg:pl-10 lg:w-3/4 lg:my-8">
        <!-- PROFILPIC -->
        <div class="flex flex-col items-center w-auto h-auto lg:items-start">
            <div class="flex flex-col lg:flex-row">
            <!-- CONDITION IF PP  -->
            <img class="w-[90px] h-[90px] mx-auto rounded-full" src="assets/img/user_avatar/<?=$user->getUserAvatar()?>" id="avatar">
            <!-- FALSE PP -->
            <!-- <img class="w-24 h-24 mx-auto rounded-full" src=""> --> 
                <div class="flex flex-col-reverse justify-center text-center lg:text-start lg:flex-col lg:ml-5">
                    <div>
                        <!-- NAME+SPE+UPDATEPP -->
                        <h6 class="text-xl font-normal "><?=$user->getUserSurName()?> <?=$user->getUserName()?></h6>
                        <p class="text-lg font-light leading-5"><?=$user->getUSerSpe()?></p>
                    </div>
                    <form id="updateAvatarForm" method="POST">
                        <input id="inputFile" type="file" style="display:none;">
                        <button type="button" id="btnChangeProfilePic" class="flex mx-auto mt-2 text-base font-semibold lg:mt-0 text-red lg:text-lg">
                        <p>Modifier&nbsp;</p>
                        <span class="hidden lg:flex">la photo de profil</span>
                        </button>
                    </form>

                    
                </div>
            </div>
            <!-- UPDATEDATA -->
            <form method="post" action="?action=updateProfil" class="flex flex-col items-start justify-start my-3 lg:my-10 ">

                <!-- <div class="flex flex-col lg:flex-row">
                    <label for="bio" class="w-11/12 text-sm font-semibold lg:text-lg ">
                        Bio
                    </label>
                    <div class="ml-4">
                        <input  type="text" name="bio" id="bio" class="h-24 lg:ml-[93.5px] border border-solid rounded-md outline-none placeholder:font-normal border-stroke">
                        <div class="flex justify-end w-full mt-1 text-sm text-top text-stroke">0/150</div>
                    </div>
                    
                </div> -->

                <div class="flex flex-col lg:flex-row lg:my-4">
                <label for="user_email" class="w-11/12 text-sm font-semibold lg:text-lg lg:pr-0.5">
                    Adresse mail
                </label>
                    <div class="ml-4">
                        <input  type="mail" name="user_email" id="email" value="<?= $user->getUserEmail()?>" class="border border-solid rounded-md outline-none leanding-8 placeholder:font-normal border-stroke">
                        <div class="flex justify-end w-full mt-1 text-sm text-stroke">0/40</div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row">
                    <label for="user_password" class="w-11/12 text-sm font-semibold lg:text-lg">
                        Mot de passe
                    </label>
                    <div class="ml-4">
                        <input type="password" name="user_password" id="mdp"  placeholder="●●●●●●●●●"  class="border border-solid rounded-md outline-none leanding-8 placeholder:font-normal border-stroke">
                        <div class="flex justify-end w-full mt-1 text-sm text-stroke">0/12</div>
                    </div>
                </div>

                <input type="submit" value="Enregister" class="px-8 py-2 mx-auto text-sm font-semibold text-white rounded-lg lg:py-1 lg:mt-10 lg:mx-0 lg:text-lg bg-red">

            </form>
        </div> 
    </div>
    <!-- EXIT -->
    <a href="?action=profil&userId=<?= $_SESSION['user']->getUserId()?>" class="absolute top-4 right-4 lg:flex lg:static lg:items-start">
        <img src="assets/svg/cross.svg" alt="Croix pour fermer la fenêtre">
    </a>
</div>
<script src="assets/script/card_creator.js"></script>
</body>
</html>