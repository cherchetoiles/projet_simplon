function showFilter(){
    var img = document.getElementById("card_img").classList;
    img.add("blur-[2px]","brightness-50");
    var list = document.getElementById("card_filter").classList;
    list.remove("hidden");}

function showFav(){
    var icon = document.getElementById("icon_fav").classList;
    icon.toggle("hidden");
    var img = document.getElementById("img_fav").classList;
    img.add("blur-[2px]","brightness-50");
    var favicon = document.getElementById("card_fav").classList;
    favicon.remove("hidden");}

function showHistory(){
    var icon = document.getElementById("icon_history").classList;
    icon.toggle("hidden");
    var cover = document.getElementById("cours_cover").classList;
    cover.add("blur-[2px]","brightness-50");
    var histo = document.getElementById("card_history").classList;
    histo.remove("hidden");}


document.addEventListener("DOMContentLoaded", function(event) {
    const tabContent1 = document.getElementById('content_1');
    const tabContent2 = document.getElementById('content_2');
    const tabContent3 = document.getElementById('content_3');

    const tabBtn1 = document.getElementById('tabBtn1');
    const tabBtn2 = document.getElementById('tabBtn2');
    const tabBtn3 = document.getElementById('tabBtn3');

    var oldContentTmp=tabContent1;
    console.log(oldContentTmp);
    console.log(tabBtn2);

    function afficherTab(oldContent,newContent){
        console.log(oldContent);
        oldContent.classList.add('hidden');
        newContent.classList.remove('hidden');
        oldContentTmp=newContent;
    }

    tabBtn1.addEventListener("click",()=>{afficherTab(oldContentTmp,tabContent1)});
    tabBtn2.addEventListener("click",()=>{afficherTab(oldContentTmp,tabContent2)});
    tabBtn3.addEventListener("click",()=>{afficherTab(oldContentTmp,tabContent3)});
})