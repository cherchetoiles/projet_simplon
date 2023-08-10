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
            <div class="flex items-center gap-2 text-2xl divide-x-2 divide-solid divide-red rounded-full border-red border-2 border-solid pl-5 pr-2 mr-5">
                <div class="flex items-center">
                    <span>
                        <?= $lesson['lesson']->getLessonLikes() ?>
                    </span>
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5752 24.4266L12.0396 23.8376L11.5752 24.4266ZM15.4997 7.10501L14.9593 7.62511C15.1007 7.77201 15.2958 7.85501 15.4997 7.85501C15.7036 7.85501 15.8987 7.77201 16.04 7.62511L15.4997 7.10501ZM19.4241 24.4266L19.8884 25.0156L19.4241 24.4266ZM8.90312 21.3793C8.58329 21.116 8.11064 21.1619 7.84742 21.4818C7.5842 21.8016 7.63009 22.2742 7.94992 22.5375L8.90312 21.3793ZM3.21666 17.2182C3.41542 17.5816 3.87115 17.7151 4.23456 17.5163C4.59797 17.3176 4.73145 16.8619 4.53269 16.4984L3.21666 17.2182ZM3.33301 11.8021C3.33301 8.94207 4.94943 6.5323 7.17353 5.51566C9.35035 4.52063 12.2451 4.80516 14.9593 7.62511L16.04 6.58491C12.9419 3.36611 9.37837 2.85854 6.54993 4.15143C3.76877 5.42271 1.83301 8.38087 1.83301 11.8021H3.33301ZM11.1109 25.0156C11.7746 25.5387 12.4731 26.0852 13.1776 26.4969C13.8819 26.9084 14.6634 27.2292 15.4997 27.2292V25.7292C15.0442 25.7292 14.5341 25.5523 13.9344 25.2018C13.3349 24.8515 12.717 24.3716 12.0396 23.8376L11.1109 25.0156ZM19.8884 25.0156C21.7442 23.5527 24.0753 21.906 25.9062 19.8444C27.7628 17.7538 29.1663 15.1768 29.1663 11.8021H27.6663C27.6663 14.7087 26.474 16.946 24.7846 18.8483C23.0695 20.7796 20.9045 22.3045 18.9598 23.8376L19.8884 25.0156ZM29.1663 11.8021C29.1663 8.38087 27.2306 5.42271 24.4494 4.15143C21.621 2.85854 18.0574 3.36611 14.9593 6.58491L16.04 7.62511C18.7542 4.80516 21.649 4.52063 23.8258 5.51566C26.0499 6.5323 27.6663 8.94207 27.6663 11.8021H29.1663ZM18.9598 23.8376C18.2823 24.3716 17.6645 24.8515 17.065 25.2018C16.4652 25.5523 15.9551 25.7292 15.4997 25.7292V27.2292C16.3359 27.2292 17.1175 26.9084 17.8217 26.4969C18.5263 26.0852 19.2248 25.5387 19.8884 25.0156L18.9598 23.8376ZM12.0396 23.8376C11.0193 23.0333 9.96457 22.2529 8.90312 21.3793L7.94992 22.5375C9.02095 23.4189 10.1438 24.2532 11.1109 25.0156L12.0396 23.8376ZM4.53269 16.4984C3.79163 15.1435 3.33301 13.6063 3.33301 11.8021H1.83301C1.83301 13.8777 2.36477 15.6606 3.21666 17.2182L4.53269 16.4984Z" fill="#1C274C"/>
                    </svg>
                </div>
                <div class="flex items-center pl-4 pr-2">
                    <svg width="18" height="21" class="w-7 h-7" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.8333 14.3864V9.64264C16.8333 5.56846 16.8333 3.53137 15.674 2.26569C14.5146 1 12.6486 1 8.91667 1C5.18471 1 3.31874 1 2.15937 2.26569C1 3.53137 1 5.56846 1 9.64264V14.3864C1 17.3281 1 18.799 1.64574 19.4417C1.95371 19.7482 2.34244 19.9408 2.75655 19.992C3.62483 20.0993 4.63879 19.1307 6.66671 17.1935C7.56311 16.3373 8.01131 15.9091 8.52987 15.7963C8.78523 15.7408 9.04811 15.7408 9.30346 15.7963C9.82202 15.9091 10.2702 16.3373 11.1666 17.1935C13.1945 19.1307 14.2085 20.0993 15.0768 19.992C15.4909 19.9408 15.8796 19.7482 16.1876 19.4417C16.8333 18.799 16.8333 17.3281 16.8333 14.3864Z" stroke="#1C274D"/>
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