<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/assets/svg/favicon.svg">

    <link href="/dist/output.css" rel="stylesheet">
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Lesson</title>

    <script src="/assets/script/lesson.js"></script>

</head>
<body class="w-full h-auto font-body">

<?php 
    $user=$_SESSION['user'];
    $notes = isset($_COOKIE['notes']) ? $_COOKIE['notes'] : '';
?>

<div class="w-10/12 mx-auto">
    <div class="inline-block">
        <span class="italic font-light font-body text-gray-dark">
            Cours > <?php echo $lesson["category"]->getCategoryName()." > Niveau ".$lesson["lesson"]->getLessonDifficult()?>
        </span>
    </div>
    <div class="flex flex-col lg:flex-row lg:items-end gap-6 mt-5">
        <img src="/assets/img/category_logo/basic/<?php echo $lesson["category"]->getCategoryLogo() ?>" class="w-16">
        <h2 class="text-xl md:text-2xl lg:text-4xl font-bold leading-0">
            <?php echo $lesson['lesson']->getLessonTitle() ?>
        </h2>     
    </div>
    <div class="flex mt-5">
        <div class="flex flex-col lg:flex-row w-full bg-black rounded-lg lg:h-[400px] shadow-lg">
            <div class="flex justify-center aspect-video mx-auto">
                <video controls class="max-width-full max-height-full" id="video">
                    <source src="/assets/lesson_videos/<?php echo $lesson["lesson"]->getLessonContent(); ?>">
                </video>
            </div>
            <!-- card -->
            <div class="relative bg-white flex flex-col w-full lg:w-3/12 h-[300px] lg:h-full overflow-y-scroll overflow-x-hidden" id="sideMenu">
                <?php 
                $i=0;
                $first=TRUE;
                foreach ($lesson['category']->getLessonFromCategory() as $linkedLesson){
                    if ($linkedLesson->getLessonDifficult()>$i){
                        $i = $linkedLesson->getLessonDifficult();
                        $svg_route=ceil($linkedLesson->getLessonDifficult()/3);
                        ?>
                <span class="font-semibold sticky bg-gray-bg text-red items-center top-0 pl-3 py-px flex">
                    <?php echo "<img src='/assets/svg/difficult/".$svg_route.".svg'>"."Niveau ".$linkedLesson->getLessonDifficult() ; $first=FALSE;?>
                </span>
                <?php }?>
                <div class="flex flex-col gap-6 px-3 py-1 <?php if ($linkedLesson->getLessonId()==$_GET["id"]){echo "bg-red text-white";} ?>">
                    <div class="flex justify-between">
                        <a href="/lesson/<?php echo $linkedLesson->getLessonId() ?>">
                        <div class="flex gap-4">
                            <img src="/assets/svg/play_icon.svg" class="w-6">
                            <span class="font-semibold line-clamp-1"><?php echo $linkedLesson->getLessonTitle() ?></span>
                        </div>
                        </a>
                        <!-- <img src="/assets/svg/checktick_icon.svg" class="w-6"> -->
                    </div>
                    </a>
                </div>
                <?php ;}?>
            </div>        
        </div>
    </div>
    <!-- profil -->
    <div class="container flex justify-between pt-8 pb-8 w-full mx-auto border-b border-solid border-stroke">
    <!-- AVATAR -->
        <div class="flex items-center w-fit">
            <div class="w-20 h-20 rounded-full overflow-hidden sm:w-28 sm:h-28 md:w-36 md:h-36 lg:h-40 lg:w-40 xl:w-44 xl:h-44">
                <img src="/assets/img/user_avatar/<?php echo $lesson['user']->getUserAvatar()?>" alt="Photo de profil de <?= $lesson['user']->getUserSurname()?>" class="w-full">
            </div>
            <div class="flex flex-row justify-between sm:mt-2">
                <div>
                    <div class="flex flex-col justify-center">
                        <!-- NAME AND JOB -->
                        <h2 class="font-body text-xl md:text-[28px] font-medium tracking-wide"><?= $lesson['user']->getUserSurname()?> <?= $lesson['user']->getUserName()?></h2>                
                        <p class="text-lg font-normal tracking-wide md:pt-1 md:text-xl font-body"><?= $lesson['user']->getSpeName()?></p>
                    </div>
                </div>
            </div>
        </div>
    <!-- bouton like -->
        <div>
            <div class="flex items-center text-2xl divide-x-2 cursor-pointer divide-solid divide-red rounded-full border-red border-2 border-solid overflow-hidden mr-5">
                <div class="flex items-center group pl-5 pr-2 transition-all duration-200 hover:bg-red" id="like_button" data-lesson = <?= $_GET['id'] ?>>
                    <span class="group-hover:text-white transition-all duration-200">
                        <?= $lesson['lesson']->getLessonLikes() ?>
                    </span>
                    <svg class="w-7 h-7" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="group-hover:fill-white transition-colors duration-200" d="M8.96173 18.9111L9.42605 18.3221L8.96173 18.9111ZM12 5.50088L11.4596 6.02098C11.601 6.16787 11.7961 6.25088 12 6.25088C12.2039 6.25088 12.399 6.16787 12.5404 6.02098L12 5.50088ZM15.0383 18.9111L15.5026 19.5001L15.0383 18.9111ZM7.00061 16.4211C6.68078 16.1579 6.20813 16.2038 5.94491 16.5236C5.68169 16.8435 5.72758 17.3161 6.04741 17.5793L7.00061 16.4211ZM2.34199 13.4117C2.54074 13.7751 2.99647 13.9086 3.35988 13.7098C3.7233 13.5111 3.85677 13.0554 3.65801 12.6919L2.34199 13.4117ZM2.75 9.13734C2.75 6.98647 3.96537 5.18277 5.62436 4.42444C7.23607 3.68772 9.40166 3.88282 11.4596 6.02098L12.5404 4.98078C10.0985 2.44377 7.26409 2.02563 5.00076 3.0602C2.78471 4.07317 1.25 6.42527 1.25 9.13734H2.75ZM8.49742 19.5001C9.00965 19.9039 9.55954 20.3345 10.1168 20.6602C10.6739 20.9857 11.3096 21.2502 12 21.2502V19.7502C11.6904 19.7502 11.3261 19.6295 10.8736 19.3651C10.4213 19.1008 9.95208 18.7368 9.42605 18.3221L8.49742 19.5001ZM15.5026 19.5001C16.9292 18.3755 18.7528 17.0868 20.1833 15.476C21.6395 13.8363 22.75 11.8029 22.75 9.13734H21.25C21.25 11.3347 20.3508 13.0285 19.0617 14.48C17.7469 15.9605 16.0896 17.1273 14.574 18.3221L15.5026 19.5001ZM22.75 9.13734C22.75 6.42527 21.2153 4.07317 18.9992 3.0602C16.7359 2.02563 13.9015 2.44377 11.4596 4.98078L12.5404 6.02098C14.5983 3.88282 16.7639 3.68772 18.3756 4.42444C20.0346 5.18277 21.25 6.98647 21.25 9.13734H22.75ZM14.574 18.3221C14.0479 18.7368 13.5787 19.1008 13.1264 19.3651C12.6739 19.6295 12.3096 19.7502 12 19.7502V21.2502C12.6904 21.2502 13.3261 20.9857 13.8832 20.6602C14.4405 20.3345 14.9903 19.9039 15.5026 19.5001L14.574 18.3221ZM9.42605 18.3221C8.63014 17.6947 7.82129 17.0966 7.00061 16.4211L6.04741 17.5793C6.87768 18.2627 7.75472 18.9146 8.49742 19.5001L9.42605 18.3221ZM3.65801 12.6919C3.0968 11.6658 2.75 10.5035 2.75 9.13734H1.25C1.25 10.7749 1.66995 12.183 2.34199 13.4117L3.65801 12.6919Z" fill="red"/>
                        <path class="group-hover:stroke-white crack <?php if ($isLiked){?> opacity-100 <?php }else{ ?>opacity-0 <?php }?> transition-colors duration-200" d="M12 5.50098L10.5 8.50034L14 11.0003L11 14.5003L13 16.5003L12 20.5003" stroke="red" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="flex items-center pl-4 pr-4 h-[32px] transition-all duration-200 hover:bg-red group">
                    <svg width="18" height="21" class="w-7 h-7" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="group-hover:stroke-white transition-all duration-200" d="M16.8333 14.3864V9.64264C16.8333 5.56846 16.8333 3.53137 15.674 2.26569C14.5146 1 12.6486 1 8.91667 1C5.18471 1 3.31874 1 2.15937 2.26569C1 3.53137 1 5.56846 1 9.64264V14.3864C1 17.3281 1 18.799 1.64574 19.4417C1.95371 19.7482 2.34244 19.9408 2.75655 19.992C3.62483 20.0993 4.63879 19.1307 6.66671 17.1935C7.56311 16.3373 8.01131 15.9091 8.52987 15.7963C8.78523 15.7408 9.04811 15.7408 9.30346 15.7963C9.82202 15.9091 10.2702 16.3373 11.1666 17.1935C13.1945 19.1307 14.2085 20.0993 15.0768 19.992C15.4909 19.9408 15.8796 19.7482 16.1876 19.4417C16.8333 18.799 16.8333 17.3281 16.8333 14.3864Z" stroke="#1C274D"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- Description -->
    <div class="w-10/12 pt-4 pb-4 mx-auto border-b lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
        <span class="mb-4 underline ">Description:</span>
        <p class="break-words w-full"><?= $lesson['lesson']->getLessonDescription() ?></p>
    </div>
    <!-- Ressources -->
    <div class="w-10/12 pt-4 pb-4 mx-auto border-b lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
        <h1 class="mb-4 underline">Ressources:</h1>
        <?php foreach($lesson["lesson"]->getLessonRessources() as $ressource){ ?>
            <div class="flex flex-col md:flex-row gap-2 items-end">
            <?= $ressource->getRessourceName() ?>
                <a target="_blank" href="<?=$ressource->getRessourceContent()?>">
                    <span class="text-xs italic font-light font-body text-gray-dark">
                        <?= $ressource->getRessourceContent() ?> 
                    </span>
                </a>
            </div>
        <?php }?>
    </div>
    <!-- Notes -->
    <div class="w-10/12 border-b pt-4 pb-4  mx-auto lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
        <label for="lname">N'oubliez pas d'écrire vos notes!</label>
        <textarea id="notesTextarea" class="h-auto w-full bg-gray/20 text-black-500" name="" cols="30" rows="10"><?php echo $notes; ?></textarea> 
    </div>          
</div>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
<script src="/assets/script/js_trick.js"></script>

<script>
    function saveNotesToCookie() {
        var notes = document.getElementById('notesTextarea').value;
        document.cookie = "notes=" + encodeURIComponent(notes);
    }

    document.getElementById('notesTextarea').addEventListener('blur', saveNotesToCookie);

    window.addEventListener('beforeunload', saveNotesToCookie);
</script>

</body>

</html>