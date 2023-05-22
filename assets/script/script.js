{
let sideBarContent = document.getElementById("crudSideBarContent");
let sideBarOpenBtn = document.getElementById("openCrudSideBar");
let mainContent = document.getElementById("mainCrudContent");

let dashboardIcon = document.getElementById("dashboard");
console.log(dashboardIcon);



function openSideBar(btn,sidebar,maincontent){
    sidebar.classList.toggle("-translate-x-full");
    maincontent.classList.toggle("md:-translate-x-[320px]")
    btn.classList.toggle("max-md:right-0");
    btn.classList.toggle("max-md:-right-6");
    if (btn.innerText==="<"){
        btn.innerText=">"
    }
    else{
        btn.innerText="<"
    }
}
sideBarOpenBtn.addEventListener("click",()=>{openSideBar(sideBarOpenBtn,sideBarContent,mainContent)});

}