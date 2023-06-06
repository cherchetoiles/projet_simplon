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
    <!-- NAVBAR -->
<?php include('view/navbar.php') ?>
<br><br>

<div class="inline-block ml-[80px]">
        <span class=" text-xs italic font-light font-body text-gray-dark">
                            Cours > React
       </span>
</div>
<br><br>
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


<br><br>
<!-- FOOTER -->
<?php include('view/footer.php') ?>
</body>

</html>