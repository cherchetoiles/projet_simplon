<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/assets/svg/favicon.svg">

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
<div class="flex flex-col items-center justify-center w-10/12 h-auto mx-auto mt-10 text-center lg:w-9/12 md:w-full font-body ">
    <div class="container">
        <div class="lg:text-start lg:w-2/3 xl:w-1/2">  
            <h1 class="mt-10 font-sans text-[32px] w-full xl:w-4/5 font-semibold leading-9 lg:leading-snug lg:text-5xl mx-auto lg:mx-0">Apprendre en <span class="whitespace-nowrap">ligne avec K-ZEL CODE !</span></h1>
            <p class="my-6 text-lg font-light leading-5 tracking-wide lg:text-2xl">Notre platforme à pour but d’aider à l’échange de connaissances à travers de courtes vidéos.</p>
            <p class="mb-2 text-lg font-medium md:mb-6 lg:text-2xl text-start">Cours le plus populaire :</p>
        </div>
        <!-- CARD VIDEO -->
        <div class="flex">
            <div class="bg-white shadow-lg drop-shadow-lg lg:w-2/3 rounded-2xl" data-lesson-id=<?php echo $topLesson["lesson"]->getLessonId() ?>>
                <!-- COVER -->
                <img src="/assets/img/lesson_miniature/<?php echo $topLesson["lesson"]->getLessonCover() ?>" alt="<?php echo $topLesson["lesson"]->getLessonTitle() ?>" class="w-full rounded-t-2xl ">
                <div class="flex items-center mx-4 my-2">
                    <div class="w-10 h-10 overflow-hidden rounded-full">
                        <img src="/assets/img/user_avatar/<?php echo $topLesson["user"]->getUserAvatar()?>" alt="Photo de profil de Steven Blombou" class="w-full">
                    </div> 
                    <div class="flex items-center justify-between w-full">
                        <div class="flex flex-col items-start ml-2">
                            <!-- TITLE + CAT -->
                            <p class="text-[10px] md:text-lg font-semibold"><?php echo $topLesson["lesson"]->getLessonAttractTitle() ?> - <?php echo $topLesson["category"]->getCategoryName() ?></p>
                            <div class="flex flex-row items-center">
                                <!-- FIRSTNAME + NAME + SPE + DIFFICULT -->
                                <p class="md:text-sm font-light text-[8px]  mr-1"><?php echo $topLesson['user']->getUserName() ?> <?php echo $topLesson['user']->getUserSurname() ?> - <?php echo $topLesson['user']->getUserSpe() ?> - <?php echo $topLesson["lesson"]->getLessonDifficult() ?></p>
                                <?php echo $svg ?>
                            </div>    
                        </div>
                        <div>
                            <img src="/assets/img/category_logo/basic/<?php echo $topLesson['category']->getCategoryLogo() ?>" alt="Logo <?=$topLesson['category']->getCategoryName()?>" class="w-auto h-8 my-auto">
                        </div>
                    </div>
                </div>
            </div>

            <div class="items-end hidden w-1/3 lg:flex">
                <lottie-player src="https://lottie.host/248c318c-7fad-45b5-8fcb-13d346adde7f/GdcJvfC03X.json" background="transparent" speed="0.60" class="w-auto h-auto" loop autoplay></lottie-player>
            </div>
            
        </div>
    </div>
    <!-- CIRCLES INFO -->
    <div class="container"> 
        <h2 class="mt-20 mb-16 font-sans text-[28px] font-semibold leading-10 lg:text-[42px]">Un apprentissage par échanges..</h2>
        <div class="flex flex-col md:flex-row">
            <!-- AUTO LEARNING -->
            <div class="flex flex-col items-center md:w-1/3">
                <div class="flex items-center justify-center mx-auto rounded-full w-60 h-60 xl:w-80 xl:h-80 bg-red/5" >
                    <img src="/assets/img/learn.png" alt="Illustration d'un homme travaillant sur son pc"  class="w-auto h-44">
                </div>
                <h3 class=" font-sans text-[26px] font-semibold lg:text-[32px] my-2">Apprendre seul</h3>
                <p class="text-[22px] font-light leading-8 lg:text-2xl mx-10">Pouvoir travailler n’importe ou en autonomie.</p> 
            </div>
            <!-- CREATE VIDEO -->
            <div class="flex flex-col items-center mt-0 md:w-1/3">
                <div class="flex items-center justify-center mx-auto rounded-full w-60 h-60 xl:w-80 xl:h-80 bg-red/5" >
                    <img src="/assets/img/create.png" alt="Illustration d'un homme travaillant sur son pc"  class="w-auto h-44">
                </div>
                <h3 class=" font-sans text-[26px] font-semibold lg:text-[32px] my-2">Créer des cours</h3>
                <p class="text-[22px] font-light leading-8 lg:text-2xl mx-10">S’affirmer sur son savoir et le partager aux autres.</p> 
            </div>
            <!-- TEAM FORUM -->
            <div class="flex flex-col items-center md:w-1/3">
                <div class="flex items-center justify-center mx-auto rounded-full w-60 h-60 xl:w-80 xl:h-80 bg-red/5" >
                    <img src="/assets/img/team.png" alt="Illustration d'un homme travaillant sur son pc"  class="w-auto h-44">
                </div>
                <h3 class=" font-sans text-[26px] font-semibold lg:text-[32px] my-2">Communiquer</h3>
                <p class="text-[22px] font-light leading-8 lg:text-2xl mx-10">Débattre des avis  et questions sur les différents cours.</p> 
            </div>
        </div>
    </div>

    <!-- CATEGORIES -->
    <div class="container">
        <h2 class="mt-20 mb-16 font-sans text-[28px] font-semibold leading-10 lg:text-[42px]">Nos catégories de cours :</h2>
        
        <div class="grid justify-center grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-14">
        <?php foreach($topCategory as $cat) { ?>
            <a href="/cours/<?php echo $cat->getCategoryId() ?>" class="flex items-center justify-center w-auto mx-2 my-3 shadow-lg rounded-xl h-44" style="background-color:<?php echo $cat->getCategoryMainColor()?>">
                <img src="/assets/img/category_logo/alt/<?=$cat->getCategoryWhiteLogo() ?>" class="h-1/2" alt="Logo <?php echo $cat->getCategoryName()?>">
            </a>
        <?php };?>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
</body>

</html>