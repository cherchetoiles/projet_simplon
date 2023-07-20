
{
    let addBtn = document.getElementById("addBtn");
    let editBtn = document.getElementById("editBtn");
    let closeModalButtons = document.getElementsByClassName("close-modal");

    let sideBarContent = document.getElementById("crudSideBarContent");
    let sideBarOpenBtn = document.getElementById("openCrudSideBar");
    let mainContent = document.getElementById("mainContent");
    let hiddenBlockElt = document.getElementById("hiddenBlockElt");

    let dashboardBtn = document.getElementById("dashboard");
    let lessonBtn = document.getElementById("lesson");
    let userBtn = document.getElementById("user");
    let categoryBtn = document.getElementById("category");
    let themeBtn = document.getElementById("theme");
    // modal
    let formAddVideo = document.getElementById("form-video");

    let delModal = document.getElementById("delModal");
    let delBtn = document.getElementById("acceptDel");

    let activeModal = formAddVideo;

    function openSideBar(btn,sidebar){
        sidebar.classList.toggle("-translate-x-full");
        btn.classList.toggle("max-md:right-0");
        btn.classList.toggle("max-md:-right-6");
        hiddenBlockElt.classList.toggle("md:pr-[320px]");
        if (btn.innerText==="<"){
            btn.innerText=">"
        }
        else{
            btn.innerText="<"
        }
    }

    function openAndCloseModal(modal){
        modal.classList.toggle("hidden");
        modal.classList.toggle("flex");
        let bg = document.createElement("div");
        if (document.getElementById("backgroundFilter")===null){
            bg.classList.add("bg-black","opacity-50","fixed","top-0","left-0","w-screen","h-screen");
            bg.id="backgroundFilter";
            document.body.appendChild(bg);
        }
        else{
            document.getElementById("backgroundFilter").remove();
        }
    }

    function openDeleteModal(modal,id,table){
        modal.classList.toggle("hidden");
        modal.classList.toggle("flex");
        let delBtn=modal.querySelector("#acceptDel");
        delBtn.setAttribute("data-id",id);
        delBtn.setAttribute("data-table",table)
        let bg = document.createElement("div");
        if (document.getElementById("backgroundFilter")===null){
            bg.classList.add("bg-black","opacity-50","fixed","top-0","left-0","w-screen","h-screen");
            bg.id="backgroundFilter";
            document.body.appendChild(bg);
        }
        else{
            document.getElementById("backgroundFilter").remove();
        }
    }
  
async function changeContent(dataLocation,newUrl){
    mainContent.innerHTML="";
    window.history.pushState(100,"crud","admin-".concat(newUrl));
    fetch("/index.php?admin="+dataLocation)
        .then(response => response.json())
        .then(data => data.forEach(element => { 
            let newNode=document.createRange().createContextualFragment(element);
            mainContent.appendChild(newNode)}))
}

function deleteLesson(id){
    fetch("?admin=deleteLesson&id="+id)
        .then(response => response.json())
        .then(data => console.log())
    changeContent("getAllLessonCard","crudLesson");
    openAndCloseModal(delModal);
}

if (delBtn!=null){
    delBtn.addEventListener("click",()=>{deleteLesson(delBtn.dataset.id)});
    }
if (lessonBtn!=null){
lessonBtn.addEventListener("click",()=>{changeContent("getAllLessonCard","crudLesson")});
changeContent("getAllLessonCard","crudLesson")
}
if (userBtn!=null){
userBtn.addEventListener("click",()=>{changeContent("getAllUserCard","crudUser")});
}
if (categoryBtn!=null){
    categoryBtn.addEventListener("click",()=>{changeContent("getAllCategoryCard","crudCategory")});
    }
if (themeBtn!=null){
    themeBtn.addEventListener("click",()=>{changeContent("getAllThemeCard","crudTheme")});
   }    
if (closeModalButtons!==null){
Array.from(closeModalButtons).forEach(element => {
    element.addEventListener("click",function(click){click.preventDefault(),openAndCloseModal(document.getElementById(element.dataset.target))})  
});
}
if (sideBarOpenBtn!==null){
sideBarOpenBtn.addEventListener("click",()=>{openSideBar(sideBarOpenBtn,sideBarContent,mainContent)});
}
if (addBtn!==null){
    addBtn.addEventListener("click",function(click){click.preventDefault(),openAndCloseModal(activeModal)})  
}
if (editBtn!==null){
    editBtn.addEventListener("click",function(click){click.preventDefault(),openAndCloseModal(activeModal)})  
}

}
// formulaire ajout de leçon
{
    const textarea = document.getElementById("textarea");
    let compteurBox = document.getElementById("compteur");
    let table = document.getElementById("table");
    let tableAddRow = document.getElementById("add_row");
    // let dropCover = document.getElementById("dropCover");
    // let dropCoverContainer = document.getElementById("dropCoverContainer")
    if (compteurBox !=null){
    compteurBox.innerHTML='511';
    var boxValue=511-textarea.value.length;}


    function compteur(){
        boxValue=511-textarea.value.length;
        compteurBox.innerHTML=boxValue;
        if (boxValue<0){
            compteurBox.classList.add("text-red")
            }
        if (boxValue>0){
            compteurBox.classList.remove("text-red")
            }
        }

    function appendTableRow(table){
        let tr = document.createElement("div");
        tr.classList.add("flex");

        let name = document.createElement("span");
        let link = document.createElement("span");
        
        name.classList.add("w-2/5","border","border-gray","border-solid");
        link.classList.add("w-3/5","border","border-gray","border-solid");

        let input1 = document.createElement("input");
        let input2 = document.createElement("input");

        input1.type="text";
        input1.name="ressources-name[]";
        input1.placeholder="ici";
        input1.classList.add("w-full","ressources-name");
        input2.type="text";
        input2.name="ressources-content[]";
        input2.placeholder="et la";
        input2.classList.add("w-full","ressources-link");

        name.appendChild(input1);
        link.appendChild(input2);

        tr.appendChild(name);
        tr.appendChild(link);
        table.appendChild(tr);
        }

    if (textarea!==null){
    textarea.addEventListener("keyup",() => {compteur();})
        }

    if (tableAddRow!==null){
        tableAddRow.addEventListener("click",() => {appendTableRow(table);})
        }
}

// ajax formulaire ajout de leçon
{
    const submitBtnAddVideo = document.getElementById("submit");
    const formAddVideo = document.getElementById("form-video");
    const alert = document.getElementById("alert");
    const alertTxt=document.getElementById("error_text")

    console.log(formAddVideo);

    function submit_video(){
        console.log(formAddVideo);
        let formData = new FormData(formAddVideo);
        fetch("?action=addVideoTreat",{method: 'POST',body:formData})
            .then(response=>response.json())
            .then(data=>changeAlert(data))
            .catch(error=>console.error(error));
    }

    function changeAlert(newText){
        alert.classList.remove("duration-[3000ms]");
        alert.classList.remove("opacity-0");
        alert.classList.remove("-z-10");
        alert.classList.add("z-20");
        alertTxt.innerHTML=newText;
        setTimeout(()=>{alert.classList.add("duration-[3000ms]");alert.classList.add("opacity-0");setTimeout(()=>{alert.classList.remove("z-20"),alert.classList.add("-z-10")},3000)},1000);
    }

    if (submitBtnAddVideo!==null){
        submitBtnAddVideo.addEventListener("click",function(click){click.preventDefault();submit_video()})
    }
}

// ajax formulaire modif profil
{
    const submitBtnUpdateProfil = document.getElementById("submit");
    const formUpdateProfil = document.getElementById("form-update");
    const alert = document.getElementById("alert");
    const alertTxt=document.getElementById("error_text")

    function submit(){
        let updateData = new FormData(formUpdateProfil,submitBtnUpdateProfil);
        fetch("?action=updateProfil",{method: 'POST',body:updateData})
            .then(response=>response.json())
            .then(data=>changeAlert(data))
            .catch(error=>console.error(error));
    }

    function changeAlert(newText){
        alert.classList.remove("duration-[3000ms]");
        alert.classList.remove("opacity-0");
        alert.classList.remove("-z-10");
        alert.classList.add("z-20");
        alertTxt.innerHTML=newText;
        setTimeout(()=>{alert.classList.add("duration-[3000ms]");alert.classList.add("opacity-0");setTimeout(()=>{alert.classList.remove("z-20"),alert.classList.add("-z-10")},3000)},1000);
    }

    if (submitBtnUpdateProfil!==null){
        submitBtnUpdateProfil.addEventListener("click",function(click){click.preventDefault();submit()})
    }
}