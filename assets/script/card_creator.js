function showFilter(){
    var img = document.getElementsByClassName("card_img").classList;
    img.add("blur-[2px]","brightness-50");
    var list = document.getElementsByClassName("card_filter").classList;
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
        newContent.classList.add('grid');
        oldContentTmp=newContent;
    }

    tabBtn1.addEventListener("click",()=>{afficherTab(oldContentTmp,tabContent1)});
    tabBtn2.addEventListener("click",()=>{afficherTab(oldContentTmp,tabContent2)});
    tabBtn3.addEventListener("click",()=>{afficherTab(oldContentTmp,tabContent3)});
})

// const updateavatar = document.getElementById('updateclick');
// updateavatar.addEventListener('click',() => editAvatar)

// const editAvatar = console.log('lololo')

// const form = document.createElement('form');
// form.action = 'updateAvatar';

document.addEventListener('DOMContentLoaded', function() {
    var btnChangeProfilePic = document.getElementById('btnChangeProfilePic');
    var inputFile = document.getElementById('inputFile');

    btnChangeProfilePic.addEventListener('click', function() {
      inputFile.click();
    });

    inputFile.addEventListener('change', function() {
      var file = this.files[0];
      var formData = new FormData();
      formData.append('user_avatar', file);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'upload.php', true);
    
      xhr.send(formData);
    });
  });

let favcontainer = document.getElementById('content_2');
let favbtn = favcontainer.querySelectorAll('a');

function ajaxBootmark(link){
    fetch(link);
}

