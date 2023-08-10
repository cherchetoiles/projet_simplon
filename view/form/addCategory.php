<form method="POST" enctype="multipart/form-data" id="form-category" class="hidden z-20 font-body text-sm overflow-hidden absolute right-1/2 top-0 translate-x-1/2 mx-auto items-center border-gray border border-solid flex-col pb-5 rounded-3xl gap-2 mt-10 bg-white">
    <div class="text-white cursor-pointer absolute top-2 font-bold font-xl right-5 close-modal" data-target="form-category">
        X
    </div>
    <div class='bg-red py-1 text-white w-full text-xl'>
        <span class="ml-5">
            Ajouter une catégorie
        </span>
    </div>
    <div class="flex flex-col items-center gap-5 px-20">
        <label class="flex flex-col">
            <span class="font-bold text-lg whitespace-nowrap">Theme parent</span>
            <select form="form-category" name="theme_parent" class="border border-black border-solid" >
                <option value="" disabled selected class="whitespace-nowrap">Selectionner une option</option>
                <?php if (isset($themes)){
                    foreach ($themes as $theme):?>
                        <option value=<?= $theme->getThemeId() ?>><?= $theme->getThemeName() ?></option>
                    <?php
                    endforeach;
                    }

                ?>
            </select>
        </label>
        <div class="w-full flex flex-col gap-2 relative">
            <canvas id="canvas" class="hidden"></canvas>
            <span class="font-bold text-lg whitespace-nowrap">Logo de la catégorie</span>
            <div class="flex relative w-40 h-40 bg-contain bg-center bg-no-repeat border border-gray border-solid mx-auto drop_category_logo">
                <div class="absolute top-1/2 translate-y-[-50%] text-center CTA-logo">glissez le logo de la catégorie ici !</div>
                <input type='file' accept="image/*" name="category_logo" class="absolute top-0 left-0 opacity-0 z-10 w-full h-full cursor-pointer" >
                <div class="grid grid-cols-1 w-3/4 max-h-full overflow-y-scroll gap-2 absolute left-40 used-color-container">
                </div>
            </div>
        </div>
        <div class="flex gap-4">
            <label class="flex flex-col">
                <span class="font-bold text-lg whitespace-nowrap">Nom de la catégorie</span>
                <input type="text" name="category_name" class="border-b border-black border-solid" >
            </label>
            <label class="flex flex-col">
                <span class="font-bold text-lg whitespace-nowrap">Catégories parent</span>
                <div class='relative'>
                    <div class='w-[200px] text-center border border-solid border-black hover:cursor-pointer' onclick="this.parentNode.querySelector('#parentCategory').classList.toggle('hidden')">
                        Selectionnez les option
                    </div>
                    <div class='hidden z-40 absolute bottom-full w-[200px] pl-1 max-h-40 overflow-y-auto flex flex-col bg-white border border-solid border-black border-b-transparent' id='parentCategory' onmouseleave="this.classList.add('hidden')">
                        <?php
                    foreach($categories as $cat){ ?>
                        <div class="whitespace-nowrap">
                            <input type='checkbox' value='<?= $cat[0]; ?>' name='categorie[]' >
                            <?= $cat[0]; ?>
                        </div>
                    <?php }
                        ?>
                    </div>
                </div>
            </label>
        </div>
        <label class="flex flex-col w-full">
            <span class="font-bold text-lg whitespace-nowrap">Description de la catégorie</span>
            <textarea form="form-category" name="category_description" class="border border-black border-solid bg-slate-100" rows=6></textarea>
        </label>
        <div class="flex flex-col gap-4">
            <label class="w-full flex flex-col gap-2">
                <span class="font-bold text-lg whitespace-nowrap">Logo alternatif de la catégorie</span>
                <div class="flex relative w-40 h-40 bg-contain bg-center bg-no-repeat border border-gray border-solid mx-auto drop_category_logo">
                    <div class="absolute top-1/2 translate-y-[-50%] text-center CTA-logo">glissez le logo alternatif de la catégorie ici !</div>
                    <input type='file' name="alt_category_logo" class="absolute top-0 left-0 opacity-0 z-10 w-full h-full cursor-pointer" >
                    <div class="grid grid-cols-1 w-3/4 max-h-full overflow-y-scroll gap-2 absolute left-40 used-color-container">
                    </div>
                </div>
            </label>
            <label class="flex flex-col items-center">
                <span class="font-bold text-lg whitespace-nowrap">Couleur principale</span>
                <input name="main_color" data-coloris value="#000000" class="border-b border-black border-solid" >
            </label>
        </div>
        <!-- alt card preview -->
        <div class="flex flex-col w-10/12">
            <span class="text-lg font-bold">Pré-visualisation</span>
            <a class="flex items-center justify-center mx-2 my-3 shadow-lg rounded-xl h-44 " id="alt-card_preview">
                <img class="h-1/2">
            </a>
        </div>
    </div>
    <input type="submit" class="bg-red px-4 pt-px rounded-md text-white w-fit mx-auto text-lg">
</form>