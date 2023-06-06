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
?>

    <!-- NAVBAR -->
<?php include('view/navbar.php') ?>
<br><br>

<div class="inline-block ml-[80px]">
        <span class=" text-xs italic font-light font-body text-gray-dark">
                            Cours > React
       </span>
</div>
<br><br>
<div class="text-6xl  w-10/12 mx-auto">
    <h1>Les base de React</h1>
</div>
 <!-- Video -->
<div class="flex w-10/12 mx-auto">
    <div class="rounded-lg shadow-lg bg-white flex grow ">
        <a href="#! w-8/12">
            <video controls class=" rounded-t-lg">
                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </a>
         <!-- card -->
        <div class="p-6 w-4/12 h-[370px] mb-[30px] block dir-ltr flex flex-col snap-start snap-always  p-3 mx-2 my-2 rounded-lg object-cover object-center h-[370px] overflow-y-scroll">
            <span class="font-semibold">
                Niveau 1
            </span>
            <div class="flex flex-col gap-6 mx-3 mt-5" >
                <div class="flex justify-between">
                    <a href="index?action=lesson">
                    <div class="flex gap-4">
                        <img src="assets/svg/play_icon.svg" class="w-6">
                        <span class="font-semibold">Leçon 1</span>
                    </div>
                    </a>
                    <img src="assets/svg/checktick_icon.svg" class="w-6">
                </div>
            </div>
        </div>     
    </div>
</div>

 <!-- profil -->
 
<div class="container flex justify-center pt-8 pb-8 mx-auto border-b border-solid lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
   <!-- AVATAR -->
    <div class="px-2 md:w-1/5">
        <img src="assets/img/user_avatar/<?=$user->getUserAvatar()?>" alt="Photo de profil de <?= $user->getUserSurname()?>" class="w-20 h-20 rounded-full sm:w-28 sm:h-28 md:w-36 md:h-36 lg:h-40 lg:w-40 xl:w-44 xl:h-44">
    </div>
    <div class="flex flex-row justify-between sm:mt-2 lg:w-4/5">
        <div>
            <div class="flex flex-col justify-center">
                <!-- NAME AND JOB -->
                <h2 class="font-body text-xl md:text-[28px] font-medium tracking-wide"><?= $user->getUserSurname()?> <?= $user->getUserName()?></h2>                
                <p class="text-lg font-normal tracking-wide md:pt-1 md:text-xl font-body"><?= $user->getSpeName()?></p>
            </div>
        </div>
    </div>
</div>
<!-- Description -->
<div class="w-10/12 border-b pt-4 pb-4  mx-auto lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
    <h1 class="mb-4 underline">Description:</h1>
    <p>Sed tenetur velit eum voluptas nobis non tenetur aliquam. Sit labore iure id quisquam voluptatem qui praesentium accusamus eum molestiae quibusdam est eligendi harum.Sed tenetur velit eum voluptas nobis non tenetur aliquam. Sit labore iure id quisquam voluptatem qui praesentium accusamus eum molestiae quibusdam est eligendi harum.</p>
</div>
<!-- Ressources -->
<div class="w-10/12 border-b pt-4 pb-4  mx-auto lg:w-10/12 xl:w-9/12 2xl:w-8/12 border-stroke">
    <h1 class="mb-4 underline">Ressources:</h1>
        <div>
        React Quick Start
            <a href=""><span class=" text-xs italic font-light font-body text-gray-dark"> https://react.dev/learn.com </span>
            </a>
        </div>
        <div>
        Start a New React Project 
            <a href=""><span class=" text-xs italic font-light font-body text-gray-dark">https://react.dev/learn/start-a-new-react-project</span>
            </a>
        </div>
</div>





<br><br>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
</body>

</html>