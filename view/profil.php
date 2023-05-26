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
    
    <title>Mon Profil</title>
    
</head>
<body class="flex flex-col w-full h-auto">
<h1 class="hidden">Profil</h1>
<!-- HEADER -->
<div class="container flex justify-center pt-16 pb-8 mx-auto my-auto border-b border-solid lg:w-11/12 xl:w-7/12 border-stroke">
   <!-- AVATAR -->
    <div class="px-2 md:w-1/5">
        <img src="assets/img/steven.png" alt="Photo de profil de Steven" class="w-20 h-20 rounded-full sm:w-28 sm:h-28 md:w-36 md:h-36 lg:w-44 lg:h-44">
    </div>
    <div class="flex flex-row justify-between sm:mt-2 lg:w-4/5">
        <div>
            <div class="flex flex-col justify-center">
                <!-- NAME AND JOB -->
                <h2 class="font-body text-xl md:text-[28px] font-medium tracking-wide">Steven Blombou</h2>                
                <p class="text-lg font-normal tracking-wide md:pt-1 md:text-xl font-body">Apprenti Développeur Web</p>
            </div>
            <div class="flex justify-between mt-1 md:mt-9">
                <!-- LIKE AND POST NUMBRE -->
                <p class="tracking-wide lg:text-lg"><strong>12 </strong>publications</p>
                <p class="tracking-wide lg:text-lg"><strong>47 </strong>j'aime</p>
            </div>
        </div>
        <div>
            <!-- UPDATE PROFIL -->
            <a href="?action=test" class="bg-[#F5F5F5] hidden lg:flex text-center px-5 py-2 rounded-md text-lg lg:text-xl"><p>Modifier le profil</p></a>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="container mx-auto bg-white lg:bg-none">
    <div class="absolute bottom-0 flex justify-center w-full py-4 text-sm font-semibold tracking-wide uppercase border-t border-solid border-stroke lg:border-none lg:static">
        <!-- COURS OF CREATOR -->
        <a href="" class="flex items-center w-auto mx-4">
            <img src="assets/svg/lesson.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour voir mes cours en ligne">
            <p class="hidden lg:flex">Mes cours</p>
        </a>
        <!-- FAVORIS -->
        <a href='' class="flex items-center w-auto mx-4 mr-24 lg:mr-0">
            <img src="assets/svg/fav.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour ajouter aux favoris" class="w-3 h-3">
            <p class="hidden lg:flex">Mes favoris</p>
        </a>
        <!-- HISTORIQUE -->
        <a href="" class="flex items-center w-auto mx-4 ">
            <img src="assets/svg/time.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour voir mon historique">
            <p class="hidden lg:flex">Mon historique</p>
        </a>
        <!-- SETTING -->
        <a href="?action=test" class="flex items-center w-auto mx-4 lg:hidden">
            <img src="assets/svg/parm.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour changer mes données">
        </a>
        <!-- CREATE FOR CREATOR -->
        <div class="absolute bottom-0 flex justify-center lg:bottom-auto lg:translate-y-[-31%] lg:right-24 xl:right-80 ">   
            <a href="?action=addVideo" class="flex items-center justify-center rounded-full lg:w-auto w-14 h-14 bg-red lg:bg-transparent">
                <svg width=30 height=30 class="w-7 h-7 lg:w-4 lg:h-4 lg:mr-1 stroke-white lg:stroke-black" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.8252 5.0189H18.2147M18.2147 5.0189H21.6042M18.2147 5.0189V8.40841M18.2147 5.0189V1.62939" stroke-linecap="round"/>
                    <path d="M1.32227 15.1877C1.39451 14.4533 1.55778 13.9589 1.92677 13.5899C2.58862 12.928 3.65384 12.928 5.78427 12.928C7.91471 12.928 8.97993 12.928 9.64178 13.5899C10.3036 14.2517 10.3036 15.3169 10.3036 17.4474C10.3036 19.5778 10.3036 20.643 9.64178 21.3049C8.97993 21.9667 7.91471 21.9667 5.78427 21.9667C3.65384 21.9667 2.58862 21.9667 1.92677 21.3049C1.57723 20.9553 1.4123 20.4933 1.33447 19.8212" stroke=" stroke-linecap="round"/>
                    <path d="M1.2666 5.01934C1.2666 2.88891 1.2666 1.82369 1.92844 1.16184C2.59029 0.5 3.65551 0.5 5.78595 0.5C7.91639 0.5 8.98161 0.5 9.64345 1.16184C10.3053 1.82369 10.3053 2.88891 10.3053 5.01934C10.3053 7.14978 10.3053 8.215 9.64345 8.87685C8.98161 9.53869 7.91639 9.53869 5.78595 9.53869C3.65551 9.53869 2.59029 9.53869 1.92844 8.87685C1.2666 8.215 1.2666 7.14978 1.2666 5.01934Z"/>
                    <path d="M13.6943 17.4474C13.6943 15.3169 13.6943 14.2517 14.3562 13.5899C15.018 12.928 16.0832 12.928 18.2137 12.928C20.3441 12.928 21.4093 12.928 22.0712 13.5899C22.733 14.2517 22.733 15.3169 22.733 17.4474C22.733 19.5778 22.733 20.643 22.0712 21.3049C21.4093 21.9667 20.3441 21.9667 18.2137 21.9667C16.0832 21.9667 15.018 21.9667 14.3562 21.3049C13.6943 20.643 13.6943 19.5778 13.6943 17.4474Z"/>
                </svg>
                <p class="hidden lg:flex">Ajouter</p>
            </a>
        </div>
    </div>
    <!-- TABLE FILE -->
    <div class="w-10/12 mx-auto my-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">

        <!-- LESSON CARD -->
            <div class="flex justify-start w-auto p-5 text-white bg-cover h-a uto rounded-xl flex- lesson bg-red">
            <!-- LOGOWHITE+TITLE+DESC -->
                <div class="flex flex-col justify-start font-body">
                    <img src="assets/svg/categories/white/html.svg" alt="Logo hmtl" class="w-16 h-auto">
                    <h2 class="mt-2 text-xl font-semibold">Apprendre le HTML</h2>
                    <p class="mt-1 mb-2 leanding-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temuam explica ea voluptates?...</p>
                    <!-- NUMBER DIFFICULT+LIKE+VIEW -->
                    <div class="flex">
                        <div class="flex mr-3">
                            1 <img src="assets/svg/difficult/1.svg" class="ml-1" alt="difficult">
                        </div>
                        <div class="flex mr-3">
                            1 <img src="assets/svg/iconlike.svg" class="ml-1" alt="like">
                        </div>
                        <div class="flex">
                            1 <img src="assets/svg/view.svg" class="ml-1" alt="view">
                        </div>
                    </div>
                </div>
                <div class="flex items-start justify-start">
                    <a href="">
                        <svg width="24" height="24"  class="duration-300 hover:stroke-blue stroke-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 8.5C8.90524 8.5 7.76142 8.5 11.6667 8.5M11.6667 8.5L9.16667 6M11.6667 8.5L9.16667 11"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.5 1.93648C5.52961 1.34088 6.725 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8C1 6.72499 1.34088 5.52961 1.93648 4.5" stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
</body>