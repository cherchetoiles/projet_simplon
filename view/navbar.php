<?php
$repo = new Theme_repo();
$themes = $repo -> getAllThemes("Code");
$repo = new Category_repo();
$categories=$repo -> getAllCategories();
?>
<div class="drawer drawer-end font-body">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
  <div class="flex flex-col drawer-content">
    <!-- Navbar -->
    <div class="border-b border-b-gray">
      <div class="flex flex-row items-center justify-center w-10/12 min-h-[4rem] mx-auto text-center lg:w-9/12 md:w-full font-body">
        <div class="container flex items-center justify-between">
          <div class="flex-none lg:hidden">
            <label for="" class="btn btn-square btn-ghost sm:scale-125">
              <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_11_796)">
                <path d="M16.1875 16.1875L19.25 19.25" stroke="#F01E29" stroke-width="2" stroke-linecap="round"/>
                <path d="M5.90625 2.86206C7.12891 2.15479 8.54843 1.75 10.0625 1.75C14.6534 1.75 18.375 5.47163 18.375 10.0625C18.375 14.6534 14.6534 18.375 10.0625 18.375C5.47163 18.375 1.75 14.6534 1.75 10.0625C1.75 8.54843 2.15479 7.12891 2.86206 5.90625" stroke="#F01E29" stroke-width="2" stroke-linecap="round"/>
                </g>
                <defs>
                <clipPath id="clip0_11_796">
                <rect width="21" height="21" fill="white"/>
                </clipPath>
                </defs>
              </svg>
            </label>
          </div>
          
          <div class="lg:flex-none">
            <a href="?action=homepage">
              <img class="w-44 sm:w-52 md:w-60 lg:w-64" src="assets/img/logo.png" alt="">
            </a>
          </div>

          <div class="flex-row hidden gap-4 lg:flex xl:gap-0">
            <div class="dropdown dropdown-hover">
              <label tabindex="0" class="flex gap-2 m-1 btn btn-ghost">
                <span class="text-lg">
                  Cours
                </span>
                <svg width="16" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17 1L9 9.84348L1 1" stroke="#F01E29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </label>
              <ul tabindex="0" class="p-2 shadow dropdown-content menu bg-base-100 rounded-box w-52">
                <div class="flex flex-row items-center w-fit gap-1 border-b-4 border-b-red mb-4">
                  <img class="w-6 h-5" src="assets/img/<?php echo $themes["theme_logo"] ?>" alt="">
                  <span class="text-lg font-semibold">
                    <?php echo $themes["theme_name"] ?>
                  </span>
                </div>
                <div>
                  <a class="font-semibold" href="?action=nos_cours">Tous nos cours</a>
                </div>
                <?php foreach($categories as $category) { ?>
                  <div>
                    <a href="?action=cours&id=<?php echo $category->getCategoryId() ?>">
                      <?php echo $category->getCategoryName() ?>
                    </a>
                  </div>
                <?php } ?>
              </ul>
            </div>

            <div class="dropdown dropdown-hover">
              <label tabindex="0" class="flex gap-2 m-1 btn btn-ghost">
                <span class="text-lg">
                  Formations
                </span>
                <svg width="16" height="9" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M 17 1L9 9.84348L1 1" stroke="#F01E29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </label>

              <div tabindex="0" class="dropdown-content p-8 shadow bg-base-100 rounded-box w-[768px] flex flex-row gap-4">
                <img class="w-8 h-8" src="assets/img/formations.png" alt="formations">
                <div class="flex flex-col text-left">
                  <span class="text-2xl font-semibold">
                    Découvrez nos formations!
                  </span>
                  <span class="text-xl">
                    Venez étudier au campus de l’UIMM de 
                    Charleville-Mézières. Différentes formations y sont 
                    proposés autour du numérique. <br>
                    Rendez-vous sur notre site <a class="text-red" href="https://simplon-charleville.fr/" target="_blank">simplon-charleville.fr</a>
                  </span>
                </div>
              </div>
            </div>

            <div>
              <label tabindex="0" class="m-1 btn btn-ghost">
                <span class="text-lg">
                  Forum
                </span>
              </label>
            </div>
          </div>

          <div class="flex-row items-center hidden p-2 border xl:flex border-gray rounded-4xl">
            <input class="w-32 focus:bg-white" type="search" placeholder="Rechercher">
            <img class="w-6 h-6" src="assets/img/search.png" alt="">
          </div>

          <a class="flex-row hidden gap-2 p-2 cursor-pointer lg:flex bg-gray/20 items-center rounded-4xl" href="?action=profil">
            <img src="assets/img/user_avatar/<?php echo $_SESSION["user"]->getUserAvatar();?>" class="rounded-full w-8">
            <span class="hidden text-blue xl:block leading-none">Profil</span>
          </a>


          <div class="flex-none lg:hidden">
            <label for="my-drawer-3" class="btn btn-square btn-ghost sm:scale-125">
              <svg width="21" height="21" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 18L1 18" stroke="black" stroke-width="2" stroke-linecap="round"/>
                <path d="M21 9.5L1 9.5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                <path d="M21 1L1 1" stroke="black" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </label>
          </div>

          

        </div>
      </div>
    </div>