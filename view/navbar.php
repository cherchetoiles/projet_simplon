<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/assets/svg/favicon.svg">
    <link href="dist/output.css" rel="stylesheet">
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- LOTTIE -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
    <script src="/assets/script/navbar.js"></script>
    <title>Accueil K-ZEL Code</title>
    
</head>
<nav class="flex px-4 py-1 justify-between h-14 items-center fixed top-0 w-full md:border-b md:border-gray md:border-solid">
  <img src="/assets/svg/searchbar-icon.svg" class="w-8" alt="" onclick="document.getElementById('searchbar').classList.toggle('-translate-y-full')">
  <div class="absolute top-0 left-0 z-10 w-full flex items-center justify-center -translate-y-full animate-all duration-200 h-14 bg-white" id="searchbar">
    <input type="text" name="searchbar" placeholder="Rechercher" class="border border-solid border-gray px-2 text-xl rounded-full">
    <div class="text-3xl absolute right-5 top-1/2 -translate-y-1/2 text-red -rotate-90" onclick="document.getElementById('searchbar').classList.toggle('-translate-y-full')">&#10140;</div>
  </div>
  <img src="/assets/img/logo.png" class="w-60">
  <div class="flex flex-col absolute w-screen top-14 animate-all duration-500 ease-[0.1,0.2,1] left-0 origin-top scale-y-0 overflow-y-scroll md:overflow-y-hidden max-h-[calc(100vh-56px)] md:scale-y-100 md:hidden md:hover:flex" id="burgerContent"
       onmouseenter="document.getElementById('coursDropdown').classList.add('border-y-[3px]')"
       onmouseleave="document.getElementById('coursDropdown').classList.remove('border-y-[3px]')">
    <?php foreach($themes as $theme){  ?>
      <div class="flex-col flex md:mt-6 ">
        <span class="flex gap-2 items-center opacity-40 ml-8 md:opacity-100 md:border-b-2 w-fit border-solid border-red">
          <img src="/assets/img/theme_logo/<?= $theme->getThemeLogo() ?>" class="h-4 md:h-6">
          <h2 class="leading-none md:text-2xl md:font-bold">
            <?= $theme->getThemeName() ?>
          </h2>
        </span>
        <div class="flex flex-col mt-4 md:flex-wrap md:flex-row md:ml-32">
          <?php foreach($theme->getCategoriesFromTheme() as $categorie) {?>
            <div class="flex flex-col md:max-w-[33%] lg:max-w-[25%]">
              <span class="leading-none flex items-center gap-2 pl-12 py-2 border-b border-solid border-gray font-bold md:border-none md:pl-0 md:text-lg" onclick="this.querySelector('span').classList.toggle('rotate-90'),document.getElementById('category-<?=$categorie->getCategoryId()?>').classList.toggle('!hidden')"><span class="text-red text-3xl leading-none animate-all duration-200 md:hidden">></span><?= $categorie->getCategoryName() ?></span>
              <div class="flex flex-col hidden pl-[74px] py-4 text-red gap-1 border-b border-solid border-gray duration-200 md:border-none md:flex md:pl-0 md:ml-20" id="category-<?=$categorie->getCategoryId()?>">
                <?php foreach($categorie->getLessonFromCategory() as $lesson){?>
                    <a class='whitespace-nowrap overflow-x-hidden coursLinks' href='/cours/<?= $lesson->getLessonId() ?>'><?= $lesson->getLessonTitle() ?><a>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <?php }  ?>
    <div class="md:hidden" onclick="this.querySelector('div').classList.toggle('!hidden'),this.querySelector('span').querySelector('span').classList.toggle('rotate-90')">
      <span class="leading-none flex items-center gap-2 pl-12 py-2 border-b border-solid border-gray font-bold"><span class="text-3xl leading-none animate-all duration-200">></span>Mon compte</span>
      <div class="!hidden flex flex-col pl-[74px] ">
        <a href="/profil">Mon profil</a>
        <a href="/logout">se déconnecter</a>
        <?php if ($_SESSION['user']->getRoleNom()==='admin'){
          echo "<a href='/admin-dashboard'>Tableau de bord</a>";
        }
        ?>
      </div>
    </div> 
  </div>
  <div class="flex flex-col gap-2 md:hidden h-fit" onclick="document.getElementById('burgerContent').classList.toggle('!scale-y-100'),
                                                  this.querySelector('.to-translate').classList.toggle('rotate-45'),
                                                  this.querySelector('.to-hide').classList.toggle('opacity-0'),
                                                  this.querySelector('.-to-translate').classList.toggle('translate-y-[3px]')
                                                  this.querySelector('.-to-translate').classList.toggle('-rotate-45')">
    <div class="py-[2px] px-5 bg-black rounded-full animate-all duration-500 origin-top-left to-translate"></div>
    <div class="py-[2px] px-5 bg-black rounded-full animate-all duration-500 to-hide"></div>
    <div class="py-[2px] px-5 bg-black rounded-full animate-all duration-500 origin-bottom-left -to-translate"></div>
  </div>
  <div class="flex items-center -mb-1 -mt-1 h-[calc(100%+8px)]">
    <span class="text-2xl items-center h-full flex gap-2 px-4 hover:border-y-[3px] border-solid border-t-transparent border-b-red" id="coursDropdown" onmouseenter="document.getElementById('burgerContent').classList.remove('md:hidden')"
                                           onmouseleave="document.getElementById('burgerContent').classList.add('md:hidden')"
                                           onclick="document.getElementById('burgerContent').classList.toggle('md:!flex'),
                                                    this.classList.toggle('!border-y-[3px]')">
      Cours<span class="text-red">v</span>
    </span>
    <span class="text-2xl flex gap-2 px-4">
      Formations<span class="text-red">v</span>
    </span>
  </div>
  <a href='/profil' class="flex py-1 px-2 bg-gray-bg rounded-full items-center gap-2">
    <div class="w-8 h-8 overflow-hidden rounded-full">  
      <img src="/assets/img/user_avatar/<?= $_SESSION['user']->getUserAvatar() ?>">
    </div>
    <span class="whitespace-nowrap leading-none">
      <?= $_SESSION['user']->getUserName()." ".$_SESSION['user']->getUserSurname() ?>
    </span>
  </a>
</nav>