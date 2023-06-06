<div class="hidden grid-cols-1 sm:grid-cols-2 lg:grid-cols-3" id="content_2">
            <?php foreach($fav_lessons as $fav_lesson){?>
                <!-- Favorite CARD -->
                <div class="w-[323px]  bg-cover h-[182px] card_container mx-4 mt-3 rounded-xl">
                <!-- LOGOWHITE -->
                    <div class="w-[323px] h-[182px] flex justify-end">
                        <img src="assets/img/cover/<?=$fav_lesson->getLessonCover()?>"  onclick="showFav()" id="img_fav" class="flex w-[323px] hover:brightness-50 hover:blur-[2px] duration-700 h-auto  cover rounded-2xl">
                        <!-- FAV ICON -->
                            <!-- <a href="?action=FavTreat&lesson_id=<?=$lesson->getLessonId()?>" class="absolute mt-4 mr-4">
                                <svg id="icon_fav" class="w-9 h-9" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="white"/>
                                    <path class="animate-pulse" d="M14 12.0455V9.54876C14 7.40445 14 6.3323 13.4142 5.66615C12.8284 5 11.8856 5 10 5C8.11438 5 7.17157 5 6.58579 5.66615C6 6.3323 6 7.40445 6 9.54876V12.0455C6 13.5937 6 14.3679 6.32627 14.7062C6.48187 14.8675 6.67829 14.9688 6.88752 14.9958C7.32623 15.0522 7.83855 14.5425 8.86318 13.5229C9.3161 13.0722 9.54256 12.8469 9.80457 12.7875C9.93359 12.7583 10.0664 12.7583 10.1954 12.7875C10.4574 12.8469 10.6839 13.0722 11.1368 13.5229L11.1368 13.5229C12.1615 14.5425 12.6738 15.0522 13.1125 14.9958C13.3217 14.9688 13.5181 14.8675 13.6737 14.7062C14 14.3679 14 13.5937 14 12.0455Z" fill="#F01E29"/>
                                </svg>
                            </a> -->
                             <!-- UNFAV ICON -->
                             <a href="?action=unFavTreat&lesson_id=<?=$fav_lesson->getLessonId()?>" class="absolute mt-4 mr-4">
                                <svg id="icon_fav" class="w-9 h-9" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20Z" fill="white"/>
                                    <path class="animate-pulse" d="M14 12.0455V9.54876C14 7.40445 14 6.3323 13.4142 5.66615C12.8284 5 11.8856 5 10 5C8.11438 5 7.17157 5 6.58579 5.66615C6 6.3323 6 7.40445 6 9.54876V12.0455C6 13.5937 6 14.3679 6.32627 14.7062C6.48187 14.8675 6.67829 14.9688 6.88752 14.9958C7.32623 15.0522 7.83855 14.5425 8.86318 13.5229C9.3161 13.0722 9.54256 12.8469 9.80457 12.7875C9.93359 12.7583 10.0664 12.7583 10.1954 12.7875C10.4574 12.8469 10.6839 13.0722 11.1368 13.5229L11.1368 13.5229C12.1615 14.5425 12.6738 15.0522 13.1125 14.9958C13.3217 14.9688 13.5181 14.8675 13.6737 14.7062C14 14.3679 14 13.5937 14 12.0455Z" fill="#F01E29"/>
                                </svg>
                            </a>
                    </div>
                    <div class="absolute hidden duration-700" id="card_fav">
                        <div class="flex flex-col justify-center p-5 text-white w-[323px] h-[182px] duration-700 -translate-y-full bg-black/30 font-body rounded-2xl">
                            <div class="absolute flex right-4 top-4 ">
                            <!-- LESSON+FAV -->
                                <a href="" class="mr-0.5">
                                    <svg width="24" height="24"  class="duration-300 hover:stroke-blue stroke-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="hover:stroke-white" d="M5 8.5C8.90524 8.5 7.76142 8.5 11.6667 8.5M11.6667 8.5L9.16667 6M11.6667 8.5L9.16667 11"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.5 1.93648C5.52961 1.34088 6.725 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8C1 6.72499 1.34088 5.52961 1.93648 4.5" stroke-linecap="round"/>
                                    </svg>
                                </a>
                                
                                <a href="?action=favTreat">
                                    <svg width="24" height="24" class="duration-300 hover:stroke-red stroke-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 9.63636V7.63901C11 5.92356 11 5.06584 10.5607 4.53292C10.1213 4 9.41421 4 8 4C6.58579 4 5.87868 4 5.43934 4.53292C5 5.06584 5 5.92356 5 7.63901V9.63636C5 10.875 5 11.4943 5.2447 11.7649C5.3614 11.894 5.50872 11.9751 5.66564 11.9966C5.99467 12.0418 6.37891 11.634 7.14739 10.8183C7.48707 10.4578 7.65692 10.2775 7.85343 10.23C7.95019 10.2066 8.04981 10.2066 8.14657 10.23C8.34308 10.2775 8.51293 10.4578 8.85261 10.8183C9.62109 11.634 10.0053 12.0418 10.3344 11.9966C10.4913 11.9751 10.6386 11.894 10.7553 11.7649C11 11.4943 11 10.875 11 9.63636Z" stroke="#F01E29"/>
                                        <path d="M4.5 1.93648C5.52961 1.34088 6.725 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8C1 6.72499 1.34088 5.52961 1.93648 4.5" stroke-linecap="round"/>
                                    </svg>
                                </a>
                                
                            </div>
                            <!-- +TITLE+DESC -->
                            <img src="assets/svg/categories/white/html.svg" alt="Logo hmtl" class="w-12 h-auto ">
                            <h2 class="mt-2 text-sm font-semibold "><?=$fav_lesson->getLessonTitle()?></h2>
                            <p class="mt-1 text-[10px] leanding-8 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temuam explica ea voluptates?...</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>