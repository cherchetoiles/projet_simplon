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

    <!-- DAISY UI -->
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    
    <title>Cours</title>
</head>
<body class="px-2">
    <?php include('view/navbar.php')?>
    <div class="flex px-2 sm:px-[10%] pt-2 mb-5">
        <div class="flex flex-col">
            <!-- header -->
            <div class="flex md:justify-evenly md:mx-auto">
                <div class="flex flex-col lg:w-7/12">
                    <div class="flex flex-col mb-5">
                        <span class="text-xs italic font-light font-body text-gray-dark">
                            Cours > React
                        </span>
                        <div class="flex gap-1 pt-2">
                            <img src="assets/img/categories_logo/logo_react.svg" class="w-16 md:w-32">
                            <div class="flex flex-col gap-1">
                                <span class="font-semibold leading-3 font-body md:text-xl">Apprenez React</span>
                                <span class="text-xs md:text-sm lg:text-base lg:leading-[1.1rem] font-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</span>
                            </div>
                        </div>
                    </div>
                    <!-- fin -->
                    <!-- conteneur grid -->
                    <div class="flex flex-col">
                        <span class="text-lg font-semibold underline md:text-2xl xl:text-3xl">
                            Avant de commencer React
                        </span>
                        <div class="grid grid-cols-1 min-[400px]:grid-cols-2 mt-5 gap-5 lg:gap-2 lg:w-11/12">
                            <div class="relative flex flex-col gap-3 p-4 bg-white rounded-lg shadow-lg md:gap-1">
                                <img src="assets/img/categories_logo/javascript_logo.svg" class="w-20 min-[400px]:w-1/3 min-[400px]:min-w-[60px]">
                                <span class="font-semibold leading-4">Apprendre le javascript</span>
                                <p class="text-xs leading-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..</p>
                                <img src="assets/svg/continue_icon.svg" class="absolute w-8 top-4 right-4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden w-5/12 lg:inline-block">
                    <img src="assets/img/illustration_lesson.png">
                </div>
            </div>
            <!-- fin -->
            <!-- présentation + liste cours -->
            <div class="flex flex-col mt-8 md:flex-row-reverse md:justify-between font-body">
                <!-- présentation -->
                <div class="flex flex-col md:w-6/12">
                    <span class="font-semibold w-2/3 text-lg md:text-2xl xl:text-3xl underline underline-offset-[3px]">
                        Qu'est ce que React ?
                    </span>
                    <span class="mt-4 mb-10 text-xs leading-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie est a eros sodales efficitur quis nec neque..
                    </span>
                    <video src="assets/lesson_videos/video.mp4" controls class="hidden md:inline-block"></video>
                </div>
                <!-- fin -->
                <!-- liste cours -->
                <div class="font-body md:w-5/12">
                    <span class="inline-block mb-5 text-lg font-semibold underline md:text-2xl xl:text-3xl">
                        Cours
                    </span>
                    <!-- conteneur -->
                    <div class="flex flex-col overflow-y-scroll snap-y-mandatory h-[400px] dir-rtl">
                        <!-- card -->
                        <div class="h-[370px] mb-[30px] block dir-ltr">
                            <div class="flex flex-col snap-start snap-always shadow-lg p-3 mx-2 my-2 rounded-lg object-cover object-center h-[370px] overflow-y-scroll">
                                <span class="font-semibold">
                                    Niveau 1
                                </span>
                                <div class="flex flex-col gap-6 mx-3 mt-5" >
                                    <div class="flex justify-between">
                                        <div class="flex gap-4">
                                            <img src="assets/svg/play_icon.svg" class="w-6">
                                            <span class="font-semibold">Leçon 1</span>
                                        </div>
                                        <img src="assets/svg/checktick_icon.svg" class="w-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin -->
                    </div>
                    <!-- fin -->
                </div>
                <!-- fin -->
            </div>
            <!-- fin -->
        </div>
    </div>
</body>
</html>