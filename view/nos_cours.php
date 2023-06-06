<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DAISY UI -->
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- LOTTIE -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 

    <title>Accueil K-ZEL Code</title>
    
</head>
<body class="w-full h-auto">
    <!-- NAVBAR -->
<?php include('view/navbar.php') ?>
</body>
<div class="flex flex-col items-center justify-center w-10/12 h-auto gap-8 mx-auto text-center lg:w-9/12 md:w-full font-body ">
    <div class="container">
        <div class="flex flex-row justify-between text-start"> 
            <div class="flex flex-col justify-center">
                <h1 class="mt-20 font-sans text-[32px] w-full xl:w-4/5 font-semibold leading-9 lg:leading-snug lg:text-5xl mx-auto lg:mx-0">Découvrez nos cours</h1>
                <p class="my-6 text-lg font-light leading-5 tracking-wide lg:text-2xl">Apprenez avec les étudiants de Simplon</p>
                <div class="flex flex-row flex-wrap gap-4">
                    <div class="rounded-lg shadow-lg dropdown">
                        <label tabindex="0" class="m-0 btn btn-ghost">
                            Thème
                            <svg class="ml-2" width="14" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L9 9.84348L1 1" stroke="#016484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="z-10 p-2 shadow dropdown-content menu bg-base-100 rounded-box w-52">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                    <div class="rounded-lg shadow-lg dropdown">
                        <label tabindex="0" class="m-0 btn btn-ghost">
                            Catégorie
                            <svg class="ml-2" width="14" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L9 9.84348L1 1" stroke="#016484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="z-10 p-2 shadow dropdown-content menu bg-base-100 rounded-box w-52">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                    <div class="rounded-lg shadow-lg dropdown">
                        <label tabindex="0" class="m-0 btn btn-ghost">
                            Difficulté
                            <svg class="ml-2" width="14" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L9 9.84348L1 1" stroke="#016484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="z-10 p-2 shadow dropdown-content menu bg-base-100 rounded-box w-52">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block">
                <img src="assets/lottie.png" alt="">
            </div> 

        </div>
    </div>

    <!-- CONTAINER -->
    <div class="container">
        <div class="grid justify-center grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-14">
        <?php foreach($lessons as $lesson){?>
            <!-- CARDS -->
            <div class="flex flex-col w-auto gap-4 px-6 py-3 my-3 shadow-lg rounded-xl h-44">
                <div class="flex flex-row justify-between border-b-gray">
                    <div>
                        <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex flex-row gap-2">
                            <a href="?action=favTreat&lesson_id=<?=$lesson['lesson']->getLessonId()?>">
                                <svg width="22" height="22" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.54167 1.94762C5.58353 1.34494 6.79315 1 8.08333 1C11.9954 1 15.1667 4.17132 15.1667 8.08333C15.1667 11.9954 11.9954 15.1667 8.08333 15.1667C4.17132 15.1667 1 11.9954 1 8.08333C1 6.79315 1.34494 5.58353 1.94762 4.54167" stroke="#1C274C" stroke-linecap="round"/>
                                    <path d="M10.2083 8.08333L8.08325 8.08333M8.08325 8.08333L5.95825 8.08333M8.08325 8.08333L8.08325 5.95831M8.08325 8.08333L8.08325 10.2083" stroke="#F01E29" stroke-linecap="round"/>
                                </svg>
                            </a>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div>                    
                    <p class="text-left font-body"><?=$lesson['lesson']->getLessonTitle()?></p>
                </div>

                <div class="overflow-hidden">                    
                    <p class="text-xs text-left font-body"><?=$lesson['lesson']->getLessonDescription()?>..</p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
</body>

</html>