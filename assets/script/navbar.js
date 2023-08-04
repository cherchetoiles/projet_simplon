
window.addEventListener("DOMContentLoaded",()=>{
    const navbar = document.querySelector('nav');

    function debounce(func, delay){
        let timer;
        return function(){
            clearTimeout(timer);
            timer = setTimeout(func,delay);
        }
    }
    
    // défilement de texte
    {
    var isMouseOver = false;

    const links = navbar.querySelectorAll('.coursLinks');

    Array.from(links).forEach(link => {
        link.addEventListener("mouseenter",()=>{
            isMouseOver = true;
            defileTextStart(link);
        })

        link.addEventListener("mouseleave",()=>{
            isMouseOver = false;
            link.scrollLeft = 0;
            clearInterval(defileText);
        })
    });

    function defileTextStart(link) {
        let starting = 0;
        let i = 0;
        let nthScroll = 0;
        defileText = setInterval(() => {
            if (starting===50){
                if (isMouseOver) {
                    link.scrollLeft+=1
                    i+=1;
                    if (i===70){
                        i=0; 
                        if (link.scrollLeft === nthScroll){
                            link.scrollLeft=0;
                            starting=0;
                        }
                        nthScroll = link.scrollLeft;
                    }
                }
            }
            else{
                starting+=1
            }
        }, 15);
      }
    }

    // barre de recherche
    {
        const searchBar = navbar.querySelector('#searchbar');
        const searchBarInput = searchBar.querySelector('input');
        const searchBarContainer = navbar.querySelector("#searchBarContainer");
        searchBarContainer.appendChild(searchBarCTA());
        const debouncedRecherche = debounce(() => recherche(searchBarInput, searchBarContainer), 200);
        searchBarInput.addEventListener('keyup',debouncedRecherche)

        
        function recherche(searchbar,searchContainer){
            searchContainer.replaceChildren();
            let search = searchbar.value;
            if (searchbar.value===""){
                searchContainer.appendChild(searchBarCTA());
            }
            else{
                search = search.split(" ");
                fetch("/searchbar",{body:JSON.stringify(search),method:'POST'})
                    .then(response=>response.json())
                    .then(data=>{data.forEach(element => {
                                    searchContainer.appendChild(searchBarCard(element.lesson_id,
                                                                              element.lesson_title,
                                                                              element.category_logo,
                                                                              element.lesson_cover,
                                                                              element.lesson_difficult))
                                });})
            }
        }
        
        function searchBarCard(lesson_id,lesson_title,category_logo,lesson_cover,lesson_difficult){
            let card = document.createElement("a");
                let coverWrapper = document.createElement("div");
                    let cover = document.createElement("img");
                let middleCtn = document.createElement("div");
                    let title = document.createElement("span");
                    let level = document.createElement("div");
                        let levelNb = document.createElement("span");
                        let levelLogo = document.createElement("img");
                let categoryWrapper = document.createElement("div");
                    let category = document.createElement("img");
            
            card.classList.add("flex","h-16","w-64","py-px","items-end");
            card.href = "/lesson/"+lesson_id
                coverWrapper.classList.add("h-full","w-28","bg-black","rounded-md","overflow-hidden");
                    cover.src="/assets/img/lesson_miniature/"+lesson_cover;
                    cover.classList.add('max-h-full',"max-w-full")
                coverWrapper.appendChild(cover);
            card.appendChild(coverWrapper);
                middleCtn.classList.add("h-full","flex","flex-col","justify-between","w-28");
                    title.classList.add("line-clamp-1")
                    title.innerHTML = lesson_title;
                middleCtn.appendChild(title);
                    level.classList.add("flex","self-end");
                        levelNb.innerHTML = lesson_difficult;
                    level.appendChild(levelNb)
                        let levelRoot = Math.floor(lesson_difficult/3);
                        if (lesson_difficult%3!==0){
                            levelRoot += 1
                        }
                        levelLogo.src = "/assets/svg/difficult/".concat(levelRoot,".svg");
                    level.appendChild(levelLogo);
                middleCtn.appendChild(level);
            card.appendChild(middleCtn);
                category.classList.add("h-[50%]");
                category.src = "/assets/img/category_logo/basic/"+category_logo;
            card.appendChild(category);
            return card;
        }

        function searchBarCTA(){
            let card = document.createElement('div');
                let illustration = document.createElement('img');
                let title = document.createElement('span');
            
            card.classList.add("flex","flex-col","justify-center","items-center","h-20","w-40");
                title.classList.add("text-center","whitespace-nowrap","text-red","font-semibold")
                title.innerHTML = "Une recherche à faire ?";
            card.appendChild(title);
                illustration.src = "/assets/svg/searchbar-icon.svg";
                illustration.classList.add("w-1/4");
            card.appendChild(illustration);
            
            return card;

        }
    }
})