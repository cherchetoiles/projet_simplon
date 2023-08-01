<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/assets/svg/favicon.svg">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="/assets/style/custom.css" rel="stylesheet">

    <!-- DAISY UI -->
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    
    <title>Cours</title>
</head>
<body class="px-2">
    <div class="flex px-2 sm:px-[10%] pt-2 mb-5">
        <div class="flex flex-col">
            <!-- header -->
            <div class="flex md:justify-evenly md:mx-auto">
                <div class="flex flex-col lg:w-7/12">
                    <div class="flex flex-col mb-5">
                        <span class="text-xs italic font-light font-body text-gray-dark">
                            Cours > <?= $cat->getCategoryName()?>
                        </span>
                        <div class="flex gap-1 pt-4">
                            <img src="/assets/svg/categories/<?=$cat->getCategoryLogo()?>" class="w-16 md:w-64">
                            <div class="flex flex-col gap-1 pl-4">
                                <span class="font-semibold leading-3 font-body md:text-2xl 2xl:text-3xl ">Apprennez <?= $cat->getCategoryName()?></span>
                                <span class="text-xs md:text-sm lg:text-lg lg:leading-6 font-body"><?= $cat->getCategoryDescription()?></span>
                            </div>
                        </div>
                    </div>
                    <!-- fin -->
                    <!-- conteneur grid -->
                    <?php if($cat->getNeededCategories()){ 
                        foreach ($cat->getNeededCategories() as $neededCat){ ?>
                    <div class="flex flex-col">
                        <span class="text-lg font-semibold underline md:text-2xl xl:text-3xl">
                            Avant de commencer  <?= $cat->getCategoryName()?>
                        </span>
                        <div class="grid grid-cols-1 min-[400px]:grid-cols-2 mt-5 gap-5 lg:gap-2 lg:w-11/12">
                            <div class="relative flex flex-col gap-3 p-4 bg-white rounded-lg shadow-lg md:gap-1">
                                <img src="/assets/svg/categories/<?= $neededCat->getCategoryLogo() ?>" class="w-20 min-[400px]:w-1/3 min-[400px]:min-w-[60px]">
                                <span class="font-semibold leading-4"><?= $neededCat->getCategoryName() ?></span>
                                <p class="text-xs leading-3"><?= $neededCat->getCategoryDescription() ?></p>
                                <a href="/cours/<?= $neededCat->getCategoryId() ?>">
                                    <img src="/assets/svg/continue_icon.svg" class="absolute w-8 top-4 right-4">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <div class="hidden w-5/12 lg:inline-block ">
                    <img class="w-2/3 h-auto pt-4" src="/assets/img/illustration_lesson.png">
                </div>
            </div>
            <!-- fin -->
            <!-- présentation + liste cours -->
            <div class="flex flex-col mt-8 md:flex-row-reverse md:justify-between font-body border-t border-stroke border-solid">
                <!-- présentation -->
                <div class="flex flex-col md:w-6/12 md:border-l border-solid border-stroke pl-3">
                    <?php $firstLesson=$cat->getLessonFromCategory()[0] ?>
                    <span class="pb-1 text-xs italic font-light font-body text-gray-dark">
                            Notre premier cours <?= $cat->getCategoryName()?>
                        </span>
                    <span class="font-semibold w-2/3 text-lg md:text-2xl underline underline-offset-[3px]">
                        Qu'est ce que <?= $cat->getCategoryName()?> ?
                    </span>
                    <span class="mt-4 mb-10 text-xs leading-4">
                    <?= $firstLesson["lesson"]->getLessonDescription() ?>
                    </span>
                    <video src="/assets/lesson_videos/<?= $firstLesson["lesson"]->getLessonContent() ?>" controls class="hidden md:inline-block"></video>
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
                        <?php 
                        $i=0;
                        $oldI=$i;
                        foreach ($cat->getLessonFromCategory() as $lesson){
                        if ($lesson['lesson']->getLessonDifficult()>$i){
                            if ($i >= 1){
                            echo "      </div>
                                    </div>
                                </div>";}
                            $i=$lesson['lesson']->getLessonDifficult();?>
                        <div class="h-[370px] mb-[30px] block dir-ltr">
                            <div class="flex flex-col snap-start snap-always shadow-lg p-3 my-2 rounded-lg object-cover items-start h-[370px] overflow-y-scroll overflow-x-hidden">
                                <span class="font-semibold">
                                    Niveau <?php echo $i ?>
                                </span>                    
                                <div class="flex flex-col mt-5 ml-3 gap-3 w-full">
                                <?php   }?>
                                <div class="flex justify-between">
                                    <a href="/lesson/<?php echo $lesson['lesson']->getLessonId()?>">
                                    <div class="flex gap-4">
                                        <img src="/assets/svg/play_icon.svg" class="w-6">
                                        <span class="font-semibold"><?= $lesson['lesson']->getLessonTitle() ?></span>
                                    </div>
                                    </a>
                                    <img src="/assets/svg/checktick_icon.svg" class="w-6 mr-3">
                                </div>
                                <?php if ($i>$oldI){ ?>
                        <?php $oldI=$i; } ?>
                        <?php }?>
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
    <!-- FOOTER -->
<?php include('view/footer.php') ?>
</body>
</html>