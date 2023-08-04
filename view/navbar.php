<script src="/assets/script/navbar.js"></script>
<nav class="flex px-4 bg-white py-1 justify-between h-14 z-20 items-center fixed top-0 w-full lg:border-b lg:border-gray lg:border-solid md:px-20 lg:px-4">
  <div class="flex items-center h-full gap-6">
    <img src="/assets/svg/searchbar-icon.svg" class="w-8 lg:hidden" alt="" onclick="document.getElementById('searchbar').classList.toggle('-translate-y-full')">
    <img src="/assets/img/logo.png" class="w-60">
    <div class="hidden lg:flex items-center -mb-1 -mt-1 h-[calc(100%+8px)]">
      <span class="text-2xl items-center h-full cursor-pointer flex gap-2 px-4 hover:border-y-[3px] border-solid border-t-transparent border-b-red" id="coursDropdown" 
                                            onmouseenter="document.getElementById('burgerContent').classList.remove('lg:hidden'),
                                                          document.getElementById('burgerContent').classList.remove('hidden')"
                                            onmouseleave="document.getElementById('burgerContent').classList.add('lg:hidden')"
                                            onclick="document.getElementById('burgerContent').classList.toggle('lg:!flex'),
                                                      this.classList.toggle('!border-y-[3px]')">
        Cours<span class="text-red">v</span>
      </span>
      <span class="group text-2xl items-center h-full cursor-pointer flex gap-2 px-4 hover:border-y-[3px] border-solid border-t-transparent border-b-red"
            onmouseenter="document.getElementById('burgerContent').classList.remove('lg:!flex'),
                          document.getElementById('coursDropdown').classList.remove('!border-y-[3px]')">
        <span>Formations<span class="text-red ml-2">v</span></span>
        <div class="hidden lg:group-hover:flex cursor-default left-1/2 -translate-x-1/2 absolute top-full max-w-[50%] pt-10">
          <div class="bg-[#F9F9F9] px-6 py-4 rounded-2xl">
            <div class="flex items-start text-lg gap-4">
              <img src="/assets/svg/theme.svg" class="h-16">
              <div class="flex flex-col gap-4 w-[100%-3rem]">
                <span class="font-bold inline-block text-2xl leading-none"> 
                  Découvrez nos formations !
                </span>
                <span class="inline-block">
                  Venez étudier à la fabrique Simplon de Charleville-Mézières. Différentes formations y sont proposés autour du numérique.<br>Rendez-vous sur notre site <a class="text-red" target="_blank" href='https://simplon-charleville.fr/'>simplon-charleville.fr<a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </span>
    </div>
  </div>
  <div class="flex flex-col h-[calc(100vw-3.5rem)] hidden scale-y-0 lg:h-auto absolute w-screen top-14 transition-all duration-500 ease-[0.1,0.2,1] left-0 origin-top  overflow-y-scroll lg:overflow-y-hidden lg:scale-y-100 lg:hidden lg:hover:flex lg:border-b border-solid border-gray bg-white" id="burgerContent"
       onmouseenter="document.getElementById('coursDropdown').classList.add('border-y-[3px]')"
       onmouseleave="document.getElementById('coursDropdown').classList.remove('border-y-[3px]')">
    <?php foreach($themes as $theme){  ?>
    <div class="flex-col flex lg:mt-6 lg:ml-8" data-themeName="<?= $theme->getThemeName(); ?>">
      <span class="flex gap-2 items-center opacity-40 ml-8 lg:opacity-100 lg:border-b-2 w-fit border-solid border-red lg:ml-0 cursor-pointer" onclick="document.querySelector('[data-themeName=<?= $theme->getThemeName() ?>]').querySelector('div').classList.toggle('lg:flex'),
                                                                                                                                          document.querySelector('[data-themeName=<?= $theme->getThemeName() ?>]').querySelector('div').classList.toggle('lg:hidden')">
        <img src="/assets/img/theme_logo/<?= $theme->getThemeLogo() ?>" class="h-4 md:h-6">
        <h2 class="leading-none md:text-2xl md:font-bold">
          <?= $theme->getThemeName() ?>
        </h2>
      </span>
      <div class="flex flex-col mt-4 lg:mt-0 lg:hidden lg:flex-wrap lg:flex-row lg:pl-32 lg:border-b border-solid border-gray-dark">
        <?php foreach($theme->getCategoriesFromTheme() as $categorie) {?>
        <div class="flex flex-col lg:w-[33%]">
          <span class="leading-none cursor-pointer lg:cursor-default flex items-center gap-2 pl-12 py-2 lg:py-0 border-b border-solid border-gray font-bold lg:border-none lg:pl-0 lg:text-lg" onclick="this.querySelector('span').classList.toggle('rotate-90'),document.getElementById('category-<?=$categorie->getCategoryId()?>').classList.toggle('hidden')"><span class="text-red text-3xl leading-none transition-all duration-200 lg:hidden">></span><?= $categorie->getCategoryName() ?></span>
          <div class="flex flex-col hidden pl-[74px] py-4 lg:py-0 text-red gap-1 border-b border-solid border-gray duration-200 lg:border-none lg:flex lg:pl-0 lg:ml-20" id="category-<?=$categorie->getCategoryId()?>">
            <?php foreach($categorie->getLessonFromCategory() as $lesson){?>
              <a class='whitespace-nowrap overflow-x-hidden coursLinks' href='/cours/<?= $lesson->getLessonId() ?>'><?= $lesson->getLessonTitle() ?></a>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
      <?php }  ?>
    <div class="lg:hidden" onclick="this.querySelector('div').classList.toggle('!hidden'),this.querySelector('span').querySelector('span').classList.toggle('rotate-90')">
      <span class="leading-none cursor-pointer flex items-center gap-2 pl-12 py-2 border-b border-solid border-gray font-bold"><span class="text-3xl leading-none transition-all duration-200">></span>Mon compte</span>
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
  <div class="flex flex-col cursor-pointer gap-2 lg:hidden h-fit" onclick="
                                                  document.getElementById('burgerContent').classList.remove('hidden'),
                                                  setTimeout(()=>{document.getElementById('burgerContent').classList.toggle('!scale-y-100')},1),
                                                  this.querySelector('.to-translate').classList.toggle('rotate-45'),
                                                  this.querySelector('.to-hide').classList.toggle('opacity-0'),
                                                  this.querySelector('.-to-translate').classList.toggle('translate-y-[3px]')
                                                  this.querySelector('.-to-translate').classList.toggle('-rotate-45')">
    <div class="py-[2px] px-5 bg-black rounded-full transition-all duration-500 origin-top-left to-translate"></div>
    <div class="py-[2px] px-5 bg-black rounded-full transition-all duration-500 to-hide"></div>
    <div class="py-[2px] px-5 bg-black rounded-full transition-all duration-500 origin-bottom-left -to-translate"></div>
  </div>
  <div class="w-full left-0 absolute bottom-full lg:w-auto lg:static lg:flex items-center gap-2">
    <div class="absolute top-0 left-0 z-10 w-full flex items-center justify-center lg:justify-normal -translate-y-full lg:h-fit transition-all duration-200 h-14 bg-white lg:relative lg:translate-y-0 lg:bg-transparent lg:w-fit lg:rounded-full lg:border lg:border-solid lg:border-gray" id="searchbar">
      <input type="text" name="searchbar" placeholder="Rechercher" class="peer border border-solid border-gray px-2 lg:py-1 text-xl rounded-full lg:w-44 lg:border-none">
      <div class="text-3xl absolute right-5 top-1/2 -translate-y-1/2 text-red -rotate-90 lg:hidden" onclick="document.getElementById('searchbar').classList.toggle('-translate-y-full')">&#10140;</div>
      <img src="/assets/svg/searchbar-icon.svg" class="hidden lg:inline-block pr-2">
      <div id="searchBarContainer" class="flex-col absolute top-[calc(100%+10px)] hidden peer-focus:flex hover:flex bg-[#F7F7F7] py-2 px-4 rounded-xl lg:right-0 right-1/2 translate-x-1/2 lg:translate-x-0"></div>
    </div>
    <div class="hidden lg:flex py-1 px-2 bg-gray-bg rounded-full cursor-pointer items-center">
      <div class="flex items-center gap-2 group" onclick="this.parentNode.querySelector('div.dropContent').classList.toggle('!hidden'),
                                                    setTimeout(()=>{this.parentNode.querySelector('div.dropContent').classList.toggle('-translate-y-2'),
                                                                    this.parentNode.querySelector('div.dropContent').classList.toggle('!opacity-0')},0)">
        <div class="w-8 h-8 overflow-hidden rounded-full">  
          <img src="/assets/img/user_avatar/<?= $_SESSION['user']->getUserAvatar() ?>">
        </div>
        <span class="whitespace-nowrap leading-none">
          V
        </span>
      </div>
      <div class="!hidden absolute top-[calc(100%+0.6rem)] opacity-100 !opacity-0 transition-all duration-700 -translate-y-2 py-px rounded-xl right-8 bg-[#F7F7F7] flex flex-col cursor-default items-center dropContent">
        <div class="w-0 h-0 border-solid border-x-[10px] border-x-transparent border-b-[15px] border-b-gray-bg bottom-full absolute right-4">
        </div>
        <div class="flex flex-col items-center py-2 px-6 border-b gap-px border-gray-dark border-solid">
          <span class="text-xl font-semibold"><?= $_SESSION['user']->getUserName()." ".$_SESSION['user']->getUserSurname() ?></span>
          <span class="text-gray text-sm"><?= $_SESSION['user']->getSpeName()?></span>
        </div>
        <div class="flex flex-col my-2 divide-y divide-gray divide-solid">
          <a href="/profil" class="group flex py-1 gap-2">
            <img class="transition-opacity duration-300 opacity-50 group-hover:opacity-100 w-4" src="/assets/svg/User.svg">
            <span class="transition-all duration-300 text-black group-hover:text-red">Mon profil</span>
          </a>
          <?php if ($_SESSION['user']->getRoleNom()==='admin'){
    echo '<a href="/admin-dashboard" class="group flex py-1 gap-2">
            <img class="transition-opacity duration-300 opacity-50 group-hover:opacity-100 w-4" src="/assets/svg/dashboard_icon.svg">
            <span class="transition-all duration-300 text-black group-hover:text-red">Tableau de bord</span>
          </a>';
          }
          ?>
          <a href="/logout" class="group flex py-1 gap-2">
            <img class="transition-opacity duration-300 opacity-50 group-hover:opacity-100 w-4" src="/assets/svg/logout.svg">
            <span class="transition-all duration-300 text-black group-hover:text-red">se déconnecter</span>
          </a>
        </div>
      </div> 
    </div>
  </div>
</nav>