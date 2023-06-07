<!-- FOOTER -->
<div class="border-t-2 border-solid border-gray-bg">
    <div class="w-4/5 px-8 mx-auto">
        <div class="flex flex-col items-center lg:flex-row lg:justify-between lg:my-5 lg:mx-5 lg:gap-8">
            <div class="text-center lg:w-72">
                <img src="assets/svg/logo.svg">
                <span class="text-red tracking-[0.35em] font-semibold text-sm lg:text-xs">APPRENDRE EN LIGNE</span>
            </div>
            <span class="mx-5 mt-10 font-light leading-7 text-center font-body lg:mt-0 lg:w-7/12 text-gray-dark lg:mx-0">
                En tant qu'apprenants, nous avons mis en place ce site afin d'aider nos futurs successeurs à acquérir des connaissances de manière simple et intuitive !
            </span>
            <div class="flex flex-col mt-10 lg:mt-0">
                <span class="font-sans text-blue">Code</span>
                <div class="grid grid-cols-2 text-gray-dark gap-x-12 font-body">
                    <span>Python</span>
                    <span>HTML</span>
                    <span>JS</span>
                    <span>PHP</span>
                    <span>CSS</span>
                    <span>Java</span>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t-2 border-solid border-gray-bg">
        <div class="relative flex flex-col items-center w-4/5 gap-2 px-10 pt-10 mx-auto mt-4 font-light lg:pt-4 border-gray-bg lg:flex-row justify-evenly lg:gap-0 text-gray-dark font-body">
            <div class="flex flex-col items-center lg:flex-row">
                <span>
                    ©Copyright Simplon.co
                </span>
                <span class="hidden lg:inline-block">-</span>
                <span class="font-bold">
                    K-ZEL CODE
                </span>
                <span class="hidden lg:inline-block">-</span>
                <span>
                    Politique de confidentialité
                </span>
                <span class="hidden lg:inline-block">-</span>
                <span>
                    Utilisation des cookies
                </span>
                <span class="hidden lg:inline-block">-</span>
                <span>
                    Mentions légales
                </span>
            </div>
            <div class="lg:absolute right-5 bottom-1.5 flex gap-2 my-2 lg:my-0">
                <a href="https://www.linkedin.com/company/simplon-charleville/" target="blank"><img src="assets/svg/in.svg"></a>
                <a href="https://www.facebook.com/ecoledescodeurs" target="_blank"><img src="assets/svg/fb.svg"></a>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->

<!--NAV IN FOOTER -->
</div> 
    <div class="drawer-side">
        <label for="my-drawer-3" class="drawer-overlay"></label> 
        <ul class="w-3/4 menu bg-base-100">
            <!-- Sidebar content here -->
            <div class="flex items-center h-16 px-8 py-4 bg-gray">
            <label class="cursor-pointer" for="my-drawer-3">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.9999 1.00007L1 18M0.999928 1L17.9999 17.9999" stroke="#393536" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </label>
            </div>

            <div class="flex flex-row items-center gap-2 px-4 py-2 font-extrabold border-b border-b-gray">
                <img class="w-6 h-5 text-gray" src="assets/img/<?php echo $themes["theme_logo"] ?>" alt="">
                <span class="text-gray font-body"><a href="?action=nos_cours"><?php echo $themes["theme_name"] ?></a></span>
            </div>

            <?php foreach($categories as $category) { ?>
            <div class="border-b collapse border-b-gray">
                <input type="checkbox" />
                <div class="flex flex-row items-center gap-2 px-8 text-xl font-bold collapse-title font-body">
                    <?php echo $category->getCategoryName() ?>
                    <div class="">
                    <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.8327 1.83234L7.50032 8.83234L1.16797 1.83234" stroke="#F01E29" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> 
                    </div>
                </div>
                <div class="px-8 collapse-content">
                    <a href="?action=cours&id=<?php echo $category->getCategoryId() ?>">Voir le cours</a>
                </div>
            </div>
            <?php } ?>
            
            <div class="border-b collapse border-b-gray">
            <input type="checkbox" />
            <div class="flex flex-row items-center gap-2 px-8 text-xl font-bold collapse-title font-body">
                Mon compte
                <div class="">
                <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.8327 1.83234L7.50032 8.83234L1.16797 1.83234" stroke="#016484" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
                </div>
            </div>
            <div class="px-8 collapse-content">
                <p class="font-bold tracking-wider text-blue font-body">
                <a href="?action=profil&userId=<?=$_SESSION['user']->getUserId()?>">Mon profil</a>
                </p>
                <p class="font-bold tracking-wider text-blue font-body">
                <a href="?action=logout">Se déconnecter</a>
                </p>
            </div>
            </div>
            <div class="border-b collapse border-b-gray">
            <input type="checkbox" />
            <div class="flex flex-row items-center gap-2 px-8 text-xl font-bold collapse-title font-body">
                Tableau de bord
                <div class="">
                <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.8327 1.83234L7.50032 8.83234L1.16797 1.83234" stroke="#016484" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
                </div>
            </div>
            <div class="px-8 collapse-content">
                <a href="?admin=crud">Tableau de bord</a>
            </div>
            </div>

        </ul>
    </div>
</div>
<!--NAV IN FOOTER -->