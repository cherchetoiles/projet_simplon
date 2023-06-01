{
let sideBarContent = document.getElementById("crudSideBarContent");
let sideBarOpenBtn = document.getElementById("openCrudSideBar");
let mainContent = document.getElementById("mainContent");
let hiddenBlockElt = document.getElementById("hiddenBlockElt");

let dashboardBtn = document.getElementById("dashboard");
let lessonBtn = document.getElementById("lesson");
let userBtn = document.getElementById("user");
let categoryBtn = document.getElementById("category");
let themeBtn = document.getElementById("theme");

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

async function changeContent(dataLocation,newUrl){
    mainContent.innerHTML="";
    let stateObj = { id: "100" };
    window.history.pushState(100,"crud","index.php?action=".concat(newUrl));
    fetch("?action="+dataLocation)
        .then(response => response.json())
        .then(data => data.forEach(element => {
            let newNode=document.createRange().createContextualFragment(element);
            mainContent.appendChild(newNode);
        }))
}

sideBarOpenBtn.addEventListener("click",()=>{openSideBar(sideBarOpenBtn,sideBarContent)});
lessonBtn.addEventListener("click",()=>{changeContent("getAllLessonCard","crudLesson")});
userBtn.addEventListener("click",()=>{changeContent("getAllUserCard","crudUser")});


}