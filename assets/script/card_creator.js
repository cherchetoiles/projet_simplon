function showFilter(){
    var img = document.getElementsByClassId("card_img").classList;
    img.add("blur-[2px]","brightness-50");
    var list = document.getElementsByClassId("card_filter").classList;
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

function updateAvatar() {
    var inputFile = document.getElementById('inputFile');
    var file = inputFile.files[0];
    
    if (file) {
      var formData = new FormData();
      formData.append('profile_photo', file);
    
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/updateAvatar', true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Traitement réussi
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            alert('La photo de profil a été mise à jour.');
            // modifier image ici
            Array.from(document.getElementsByClassName("avatar")).forEach(elt =>elt.setAttribute("src","/".concat(response.new_file)))
          } else {
            alert('Erreur : ' + response.message);
          }
        } else {
          // Gestion des erreurs
          console.error(xhr.responseText);
        }
      };
      xhr.onerror = function() {
        // Gestion des erreurs
        console.error(xhr.responseText);
      };
      xhr.send(formData);
    }
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    var btnChangeProfilePic = document.getElementById('btnChangeProfilePic');
    btnChangeProfilePic.addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('inputFile').click();
    });
  
    var inputFile = document.getElementById('inputFile');
    inputFile.addEventListener('change', function() {
      updateAvatar();
    });
  });



let favcontainer = document.getElementById('content_2');
let favbtn = favcontainer.querySelectorAll('a');

function ajaxBootmark(link){
    fetch(link);
}


