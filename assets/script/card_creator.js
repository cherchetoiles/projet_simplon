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
    var list = document.getElementById("card_fav").classList;
    list.remove("hidden");}