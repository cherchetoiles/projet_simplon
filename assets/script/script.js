{
let sideBarContent = document.getElementById("crudSideBarContent");
let sideBarOpenBtn = document.getElementById("openCrudSideBar");

function openSideBar(btn,sidebar){
    console.log("btn");
    sidebar.classList.toggle("-translate-x-full");
    if (btn.innerHTML==="<"){
        btn.innerHTML=">"
    }
    else{
        btn.innerHTML="<"
    }
}
console.log(sideBarContent,sideBarOpenBtn);
sideBarOpenBtn.addEventListener("onclick",()=>{openSideBar(sideBarOpenBtn,sideBarContent)});

}