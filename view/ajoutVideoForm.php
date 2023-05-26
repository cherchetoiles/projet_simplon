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
    <title>Ajout de vidéo</title>
</head>
<body class="font-body text-sm">
    <form class="mx-auto w-full lg:w-4/5 xl:w-3/5 xl:min-w-[1200px] p-5 border-gray border border-solid flex flex-col items-center rounded-[40px] lg:px-20 mt-10 py-2" action="?action=addVideoTreat" method="POST" enctype="multipart/form-data" id="form">
        <div class="flex flex-col-reverse md:flex-row justify-between items-start w-full mt-5">
            <span class="font-bold text-4xl"> Formulaire d'ajout:</span>
            <button class="font-semibold flex items-start py-2 px-5 border border-solid border-gray gap-2 rounded-lg leading-none">Annuler <span class="text-red font-light text-xs leading-none">x</span></button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 mt-10 gap-y-5 w-full">
            <div class="flex flex-col">
                <span class="font-semibold">Titre du cours :</span>
                <input type="text" name="title" placeholder="Ex : La base du php" class="border border-solid border-gray px-4 py-1 rounded-lg focus:outline-none" id="title">
            </div>
            <div class="flex flex-col lg:ml-20">
                <span class="font-semibold">catégorie</span>
                <select id="category" name="category" class="border border-solid border-gray py-1 px-4 rounded-lg focus:outline-none" form="form">
                    <?php
                    $catRepo=new Category_repo();
                    foreach ($catRepo->getAllCategoryName() as $catName):?>
                        <option><?= $catName[0];?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold">Titre de mise en avant</span>
                <input type="text" placeholder="Ex : Qu'est ce que le PHP ????" id="attract_title" class="border border-solid border-gray px-4 py-1 rounded-lg focus:outline-none" name="attract_title">
                <span class="">Un titre attrayant vous fera gagner en visibilité !</span>
            </div>  
            <div class="flex flex-col md:ml-20">
                <span class="font-semibold">Difficulté</span>
                <select id="level" class="border border-solid border-gray px-4 py-1 rounded-lg focus:outline-none" name="level" form="form">
                    <?php for ($i=1;$i<10;$i++):?>
                        <option><?=$i?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <span class="w-full">
        description:
        </span>
        <div class='relative rounded-lg border border-gray border-solid w-full'>
            <div class='relative rounded-lg pb-4'>
                <textarea name='description' id='textarea' name="description" form="form" class='relative w-full border-transparent rounded-lg resize-none focus:outline-none' rows="6"></textarea>
            </div>
            <span class='absolute bottom-0 right-1 z-10' id='compteur'>
            </span>
        </div>
        <div class="w-full h-72 drop-box rounded-[17px] transition-colors bg-opacity-60 mt-5 relative flex items-center justify-center" id="dropCoverContainer">
            <div class="flex flex-col items-center">
                <img src="assets/svg/upload_icon.svg">
                <span>Glissez votre image ici</span>
                <span>ou</span>
                <span>téléchargez de vos fichiers</span><span class="underline text-red"><input type="file"  id="cover" name="cover"></span>
            </div>
        </div>
        <div class="w-full h-72 drop-box rounded-[17px] transition-colors bg-opacity-60 mt-5 relative flex items-center justify-center" id="dropCoverContainer">
            <div class="flex flex-col items-center">
                <img src="assets/svg/upload_video_icon.svg">    
                <span>Glissez votre vidéo ici</span>
                <span>ou</span>
                <span>téléchargez de vos fichiers</span><span class="underline text-red"><input type="file" id="video" name="content"></span>
            </div>
        </div>
        <div class="mt-10 w-full">
            <div class="flex justify-between">
                <span class="font-semibold">Ressources liées</span>
                <span class="text-red text-2xl hover:cursor-pointer" id="add_row">+</span>
            </div>
            <div class="w-full" id="table">
                <div class="flex">
                    <span class="w-2/5 border-gray border border-solid">Nom</span>
                    <span class="w-3/5 border-gray border border-solid">Lien</span>
                </div>
            </div>
        </div>
        <input type="submit" class="bg-red text-white mx-auto inline-block mt-10 px-10 py-4 rounded-lg leading-none" id="submit" value="Envoyer la demande de post">
    </form>
    <div id="test"></div>
    <script src="assets/script/script.js"></script>
</body>