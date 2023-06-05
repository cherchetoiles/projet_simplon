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
<div class="flex flex-col items-center justify-center gap-8 w-10/12 h-auto mx-auto text-center lg:w-9/12 md:w-full font-body ">
    <div class="container">
        <div class="flex flex-row justify-between text-start"> 
            <div class="flex flex-col justify-center">
                <h1 class="mt-20 font-sans text-[32px] w-full xl:w-4/5 font-semibold leading-9 lg:leading-snug lg:text-5xl mx-auto lg:mx-0">Découvrez nos cours</h1>
                <p class="my-6 text-lg font-light leading-5 tracking-wide lg:text-2xl">Apprenez avec les étudiants de Simplon</p>
                <div class="flex flex-row flex-wrap gap-4">
                    <div class="dropdown shadow-lg rounded-lg">
                        <label tabindex="0" class="btn btn-ghost m-0">
                            Thème
                            <svg class="ml-2" width="14" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L9 9.84348L1 1" stroke="#016484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-10">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                    <div class="dropdown shadow-lg rounded-lg">
                        <label tabindex="0" class="btn btn-ghost m-0">
                            Catégorie
                            <svg class="ml-2" width="14" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L9 9.84348L1 1" stroke="#016484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-10">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                    <div class="dropdown shadow-lg rounded-lg">
                        <label tabindex="0" class="btn btn-ghost m-0">
                            Difficulté
                            <svg class="ml-2" width="14" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 1L9 9.84348L1 1" stroke="#016484" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 z-10">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block">
                <img src="assets/img/lottie.png" alt="">
            </div> 

        </div>
    </div>

    <!-- CONTAINER -->
    <div class="container">
        <div class="grid justify-center grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-14" id="mainContent">


        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
</body>
<script src="assets/script/script.js"></script>
</html>