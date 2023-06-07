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
    <title>Lesson</title>
    
</head>
<body class="w-full h-auto">

<?php 
    $user=$_SESSION['user'];
    $notes = isset($_COOKIE['notes']) ? $_COOKIE['notes'] : '';
?>

    <!-- NAVBAR -->
<?php include('view/navbar.php') ?>
<div class="w-10/12 mx-auto mt-10">
    <div class="inline-block">
        <span class="italic font-light font-body text-gray-dark">
            Cours > <?php echo $lesson["category"]->getCategoryName()." > Niveau ".$lesson["lesson"]->getLessonDifficult()?>
        </span>
    </div>
    <div class="flex items-end mt-5 gap-6">
        <img src="assets/svg/categories/<?php echo $lesson["category"]->getCategoryLogo() ?>" class="w-16">
        <h2 class="font-bold text-4xl leading-0">
            <?php echo $lesson['lesson']->getLessonTitle() ?>
        </h2>     
    </div>
    <div class="flex mt-5">
        <div class="rounded-lg shadow-lg bg-white flex mx-auto">
            <a href="#!" class="w-9/12 flex">
                <video controls id="video">
                    <source src="assets/lesson_videos/<?php echo $lesson["lesson"]->getLessonContent(); ?>">
                </video>
            </a>
            <!-- card -->
            <div class="flex flex-col w-3/12 overflow-y-scroll relative grow" id="sideMenu">
                <?php 
                $i=0;
                $first=TRUE;
                foreach ($lesson['category']->getLessonFromCategory() as $linkedLesson){
                    if ($linkedLesson['lesson']->getLessonDifficult()>$i){
                        $i=$linkedLesson['lesson']->getLessonDifficult();
                        if ($i < 4){
                            $colors = ["red","#D9D9D9","#EAEAEA"];
                        }
                        elseif ($i > 6){
                            $colors = ["red","red","red"];
                        }
                        else {
                            $colors = ["red","red","#D9D9D9"];
                        }
                        $svg = '<svg width="20" height="20" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.04289 7.29289C0.75 7.58579 0.75 8.05719 0.75 9V15C0.75 15.9428 0.75 16.4142 1.04289 16.7071C1.33579 17 1.80719 17 2.75 17C3.69281 17 4.16421 17 4.45711 16.7071C4.75 16.4142 4.75 15.9428 4.75 15V9C4.75 8.05719 4.75 7.58579 4.45711 7.29289C4.16421 7 3.69281 7 2.75 7C1.80719 7 1.33579 7 1.04289 7.29289Z" fill='.$colors[0].' />
                                    <path d="M7.75 5C7.75 4.05719 7.75 3.58579 8.04289 3.29289C8.33579 3 8.80719 3 9.75 3C10.6928 3 11.1642 3 11.4571 3.29289C11.75 3.58579 11.75 4.05719 11.75 5V15C11.75 15.9428 11.75 16.4142 11.4571 16.7071C11.1642 17 10.6928 17 9.75 17C8.80719 17 8.33579 17 8.04289 16.7071C7.75 16.4142 7.75 15.9428 7.75 15V5Z" fill='.$colors[1].' />
                                    <path d="M15.0429 0.292893C14.75 0.585786 14.75 1.05719 14.75 2V15C14.75 15.9428 14.75 16.4142 15.0429 16.7071C15.3358 17 15.8072 17 16.75 17C17.6928 17 18.1642 17 18.4571 16.7071C18.75 16.4142 18.75 15.9428 18.75 15V2C18.75 1.05719 18.75 0.585786 18.4571 0.292893C18.1642 0 17.6928 0 16.75 0C15.8072 0 15.3358 0 15.0429 0.292893Z" fill='.$colors[2].' />
                                    <path d="M0.75 19.25C0.335786 19.25 0 19.5858 0 20C0 20.4142 0.335786 20.75 0.75 20.75H18.75C19.1642 20.75 19.5 20.4142 19.5 20C19.5 19.5858 19.1642 19.25 18.75 19.25H0.75Z" fill="#B7B7B7"/>
                                </svg>';?>
                <span class="font-semibold sticky bg-gray-bg text-red items-center top-0 pl-3 py-px gap-5 flex <?php if (!$first){echo "mt-2";} ?>">
                    <?php echo $svg."Niveau ".$i ; $first=FALSE;?>
                </span>
                <?php }?>
                <div class="flex flex-col gap-6 px-3 py-1 mt-2 <?php if ($linkedLesson["lesson"]->getLessonId()==$_GET["id"]){echo "bg-slate-200";} ?>">
                    <div class="flex justify-between">
                        <a href="index?action=lesson&id=<?php echo $linkedLesson["lesson"]->getLessonId() ?>">
                        <div class="flex gap-4">
                            <img src="assets/svg/play_icon.svg" class="w-6">
                            <span class="font-semibold line-clamp-1"><?php echo $linkedLesson["lesson"]->getLessonTitle() ?></span>
                        </div>
                        </a>
                        <!-- <img src="assets/svg/checktick_icon.svg" class="w-6"> -->
                    </div>
                    </a>
                </div>
                <?php ;}?>
            </div>        
        </div>
    </div>
    <!-- profil -->
    <div class="container flex justify-center pt-8 pb-8 mx-auto border-b border-solid border-stroke">
    <!-- AVATAR -->
        <div class="px-2 md:w-1/5">
            <img src="assets/img/user_avatar/<?php echo $lesson['user']->getUserAvatar()?>" alt="Photo de profil de <?= $lesson['user']->getUserSurname()?>" class="w-20 h-20 rounded-full sm:w-28 sm:h-28 md:w-36 md:h-36 lg:h-40 lg:w-40 xl:w-44 xl:h-44">
        </div>
        <div class="flex flex-row justify-between sm:mt-2 lg:w-4/5">
            <div>
                <div class="flex flex-col justify-center">
                    <!-- NAME AND JOB -->
                    <h2 class="font-body text-xl md:text-[28px] font-medium tracking-wide"><?= $lesson['user']->getUserSurname()?> <?= $lesson['user']->getUserName()?></h2>                
                    <p class="text-lg font-normal tracking-wide md:pt-1 md:text-xl font-body"><?= $lesson['user']->getSpeName()?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Description -->
    <div class="w-10/12 border-b pt-4 pb-4  mx-auto lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
        <span class="mb-4 underline">Description:</span>
        <p><?= $lesson['lesson']->getLessonDescription() ?></p>
    </div>
    <!-- Ressources -->
    <div class="w-10/12 border-b pt-4 pb-4  mx-auto lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
        <h1 class="mb-4 underline">Ressources:</h1>
        <?php foreach($lesson["lesson"]->getLessonRessources() as $ressource){ ?>
            <div>
            <?= $ressource->getRessourceName() ?>
                <a href="<?= $ressource->getRessourceContent() ?>"><span class="text-xs italic font-light font-body text-gray-dark"> <?= $ressource->getRessourceContent() ?> </span>
                </a>
            </div>
        <?php }?>
    </div>
    <!-- Notes -->
    <div class="w-10/12 border-b pt-4 pb-4  mx-auto lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
        <label for="lname">n'oubliez pas d'écrire vos notes!</label>
        <textarea id="notesTextarea" class="h-auto w-full bg-gray/20 text-black-500" name="" cols="30" rows="10"><?php echo $notes; ?></textarea> 
    </div>          
</div>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
<script src="assets/script/js_trick.js"></script>

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