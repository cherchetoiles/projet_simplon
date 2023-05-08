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
    
    <title>Inscription à K-ZEL Code</title>
    
</head>
<body class="flex items-center justify-center w-full h-auto lg:h-screen bg-gray-bg">

<div class="flex flex-col justify-center w-full h-auto py-20 mx-2 my-2 bg-white xl:w-9/12 items-cent lg:px-16 md:py-20 xl:px-46 lg:my-0 rounded-4xl drop-shadow-2xl ">
    <!-- RIGHT SECTION DESKTOP -->
    <div class="flex flex-col items-center p-1 text-center lg:text-start lg:flex-row">
        <div class="flex flex-col items-center w-11/12 lg:items-start lg:w-5/12">
            <h1 class=" font-body text-5xl md:text-[58px]  font-bold pb-14 ">Inscription</h1>
            <!-- FORM -->
            <form method="POST" action="?action=signin_treat" class="w-full">

                <div class="flex flex-col"> 

                    <div class="flex">
                        
                        <label class="flex flex-col w-1/2 mr-6" name="name">
                            <div class="flex ">
                                <img src="assets/svg/User.svg" class="w-5 h-auto ml-[3px] mr-6 h-max-5">
                                <input type="name" name="name" placeholder="Nom" class="w-full text-2xl font-light lg:text-xl xl:text-2xl placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                            </div>
                            <div class="w-full block mt-1 h-[1px] rounded-full bg-gray-dark"></div>
                        </label>

                        <label class="flex flex-col w-1/2 " name="firstname">
                            <div class="flex">
                                <img src="assets/svg/User.svg" class="w-5 h-auto ml-[3px] mr-6 h-max-5">
                                <input type="firstname" name="firstname" placeholder="Prénom" class="w-full text-2xl font-light lg:text-xl xl:text-2xl placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                            </div>
                            <div class="w-full block mt-1 h-[1px] rounded-full bg-gray-dark"></div>
                        </label> 

                    </div>

                    <label class="flex mt-10" name="password">
                        <img src="assets/svg/User.svg" class="w-5 h-auto mr-6 h-max-5">
                        <input type="email" name="email" placeholder="Votre adresse mail" class="w-full text-2xl font-light lg:text-xl xl:text-2xl placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                    </label>
                    
                    <div class="w-full block mt-1 h-[1px] rounded-full bg-gray-dark"></div>

                    <label class="flex mt-10" name="password">
                        <img src="assets/svg/Pass.svg" class="w-5 h-auto mr-6 h-max-5">
                        <input type="password" name="password" placeholder="Votre mot de passe" class="w-full text-2xl font-light lg:text-xl xl:text-2xl placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                    </label>

                    <div class="w-full block mt-1 h-[1px] rounded-full bg-gray-dark"></div>

                    <label class="flex mt-10" name="password">
                        <img src="assets/svg/Repass.svg" class="w-5 h-auto mr-6 h-max-5">
                        <input type="password" name="repassword" placeholder="Vérifiaction du mot de passe" class="w-full text-2xl font-light lg:text-xl xl:text-2xl placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                    </label>

                    <div class="w-full block mt-1 h-[1px] rounded-full bg-gray-dark"></div>
                    
                    <label class="flex text-black my-14" name="terms">
                        <input type="checkbox" name="terms"  class="ml-1.5 accent-red stroke-black"><p class="ml-5 text-xl font-light font-body lg:text-base xl:text-xl ">Conditions d'utilisations</p>
                    </label>
                    
                    <div class="flex flex-col items-center justify-center w-full h-auto text-center md:justify-evenly lg:items-end lg:justify-end md:flex-row">

                        <a href="" class="px-7 py-4 text-white w-3/5 transition  rounded-lg lg:w-full hover:duration-150 border-[1px] border-solid hover:ease-out font-medium border-red hover:bg-hovered font-body hover:border-hovered bg-red">
                            <div class="w-full m-auto text-base lg:text-sm xl:text-base">
                                S'inscrire
                            </div>
                        </a>
                        <a href="" class="w-3/5 lg:w-full mt-3 px-7 py-4 text-red md:mt-0 md:ml-1 border-[1px] border-solid text-lg transition font-medium rounded-lg hover:duration-150 hover:ease-out hover:text-hovered hover:border-hovered hover:bg-stroke/10">
                            <div class="w-full m-auto text-base lg:text-sm xl:text-base">
                                Se connecter
                            </div>
                        </a>
                
                    </div>
                
                </div>
            </form>
        </div>
        <div class="flex justify-end w-full h-auto px-3 py-10 mx-2 lg:w-7/12 md:mx-0 lg:px-0 lg:py-0 md:pt-20">
        <img src="assets/img/inscription.png" class="w-auto h-auto p-4">
        </div>
    </div>
    <div class="w-9/12 text-base font-light leading-7 text-center lg:mt-12 lg:w-11/12 font-body"> 
        <p class="font-base">
            Déjà inscript ? <a href="?action=signin" class="font-normal">Connectez-vous</a> 
            dès maintenant <span class="italic font-normal">la plateforme 
            de cours en ligne</span> des apprenants 
            de <a href="" target="_blank" class="font-normal"> Simplon !
        </p>
   </div>
</div>

</body> 
</html>