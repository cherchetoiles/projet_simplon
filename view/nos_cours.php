<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="assets/style/custom.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Cours</title>
</head>
<body class="w-screen">
    <!-- HERO -->
    <div class="hero">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <img src="assets/lottie.png" class="hidden lg:block max-w-sm rounded-lg shadow-2xl" />
            <div class="flex flex-col justify-around mx-20">
                <h1 class="text-5xl font-bold">Découvrez nos cours!</h1>
                <p class="py-6 text-2xl">
                    Apprenez avec les étudiants de Simplon
                </p>
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
        </div>
    </div>
    <!-- HERO -->

    <!-- CARDS -->
    <div class="flex flex-wrap justify-center gap-8 p-4 max-w-7xl mx-auto my-12">
        <!-- CARD -->
        <div class="max-w-xs bg-base-100 shadow-xl">
            <figure class="px-10 pt-10 flex justify-between">
                <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                </svg>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </figure>
            <div class="flex flex-col gap-2 px-8 py-4">
                <h2 class="text-xl font-semibold leading-7">Apprendre le HTML</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                <div class="card-actions">
                </div>
            </div>
        </div>
        <!-- CARD -->
        <!-- CARD -->
        <div class="max-w-xs bg-base-100 shadow-xl">
            <figure class="px-10 pt-10 flex justify-between">
                <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                </svg>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </figure>
            <div class="flex flex-col gap-2 px-8 py-4">
                <h2 class="text-xl font-semibold leading-7">Apprendre le HTML</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                <div class="card-actions">
                </div>
            </div>
        </div>
        <!-- CARD -->
        <!-- CARD -->
        <div class="max-w-xs bg-base-100 shadow-xl">
            <figure class="px-10 pt-10 flex justify-between">
                <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                </svg>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </figure>
            <div class="flex flex-col gap-2 px-8 py-4">
                <h2 class="text-xl font-semibold leading-7">Apprendre le HTML</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                <div class="card-actions">
                </div>
            </div>
        </div>
        <!-- CARD -->
        <!-- CARD -->
        <div class="max-w-xs bg-base-100 shadow-xl">
            <figure class="px-10 pt-10 flex justify-between">
                <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                </svg>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </figure>
            <div class="flex flex-col gap-2 px-8 py-4">
                <h2 class="text-xl font-semibold leading-7">Apprendre le HTML</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                <div class="card-actions">
                </div>
            </div>
        </div>
        <!-- CARD -->
        <!-- CARD -->
        <div class="max-w-xs bg-base-100 shadow-xl">
            <figure class="px-10 pt-10 flex justify-between">
                <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                </svg>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </figure>
            <div class="flex flex-col gap-2 px-8 py-4">
                <h2 class="text-xl font-semibold leading-7">Apprendre le HTML</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                <div class="card-actions">
                </div>
            </div>
        </div>
        <!-- CARD -->
        <!-- CARD -->
        <div class="max-w-xs bg-base-100 shadow-xl">
            <figure class="px-10 pt-10 flex justify-between">
                <svg width="52" height="57" viewBox="0 0 52 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.651997 1.88693L4.41631 49.2143C4.47282 49.9249 4.96232 50.531 5.65381 50.7464L25.4617 56.9182C25.812 57.0273 26.1881 57.0273 26.5384 56.9182L46.3463 50.7464C47.0378 50.531 47.5272 49.9249 47.5838 49.2143L51.3481 1.88693C51.429 0.869415 50.6108 0 49.5723 0H2.42788C1.38944 0 0.571172 0.869415 0.651997 1.88693ZM41.6947 16.571H17.162L17.9024 23.2807H41.1612L39.6396 42.409L26.0001 46.6588L12.3606 42.409L11.5657 32.4156H18.7248V37.3175L26.1914 39.2869L33.6134 37.3175L34.1892 29.5052H11.3341L9.81677 10.4271H42.1833L41.6947 16.571Z" fill="#FC490B"/>
                </svg>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 2.33782C7.47087 1.48697 9.17856 1 11 1C16.5228 1 21 5.47715 21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 9.17856 1.48697 7.47087 2.33782 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 11C11.6863 11 10.3137 11 15 11M15 11L12 8M15 11L12 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </figure>
            <div class="flex flex-col gap-2 px-8 py-4">
                <h2 class="text-xl font-semibold leading-7">Apprendre le HTML</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                <div class="card-actions">
                </div>
            </div>
        </div>
        <!-- CARD -->
    </div>
    
    <!-- CARDS -->

    <?php
    include("view/footer.php");
    ?>


</body>