{
let sideBarContent = document.getElementById("crudSideBarContent");
let sideBarOpenBtn = document.getElementById("openCrudSideBar");
let mainContent = document.getElementById("mainCrudContent");

let dashboardIcon = document.getElementById("dashboard");



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
if (sideBarOpenBtn!==null){
sideBarOpenBtn.addEventListener("click",()=>{openSideBar(sideBarOpenBtn,sideBarContent,mainContent)});
}

}


{
const textarea = document.getElementById("textarea");
let compteurBox = document.getElementById("compteur");
let table = document.getElementById("table");
let tableAddRow = document.getElementById("add_row");
// let dropCover = document.getElementById("dropCover");
// let dropCoverContainer = document.getElementById("dropCoverContainer")
compteurBox.innerHTML='511';
var boxValue=511-textarea.value.length;


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
    input2.name="ressources-link[]";
    input2.placeholder="et la";
    input2.classList.add("w-full","ressources-link");

    name.appendChild(input1);
    link.appendChild(input2);

    tr.appendChild(name);
    tr.appendChild(link);
    table.appendChild(tr);
    }

// function dragShow(dropElement){
//     dropElement.classList.add("bg-gray");
//     console.log(DragEvent);
// }

// function dragHide(dropElement){
//     dropElement.classList.remove("bg-gray");
// }

// function giveDropEventListener(dropElement,dropContainer){
//     dropElement.addEventListener("dragenter", ()=>{dragShow(dropContainer);});
//     dropElement.addEventListener("dragleave", ()=>{dragHide(dropContainer);});

// }

// function onDrop(event) {
//     const data = event.dataTransfer.getData("text/plain");
//     event.target.textContent = data;
//     event.preventDefault();
//   }

// dropCover.addEventListener("drop", ()=>{onDrop(dropCover);});

if (textarea!==null){
textarea.addEventListener("keyup",() => {compteur();})
    }

if (tableAddRow!==null){
    tableAddRow.addEventListener("click",() => {appendTableRow(table);})
    }

// if (dropCover!==null){
//     giveDropEventListener(dropCover,dropCoverContainer)
// }
}
{
    // const submitBtn = document.getElementById("submit");
    // const form = document.getElementById("form");
    // const test = document.getElementById("test");

    // function submit(){
    //     let formData = new FormData(form,submitBtn);
    //     fetch("?action=addVideoTreat",{method: 'POST',body:formData})
    //         .then((response)=>response.json())
    //         .then((data)=>console.log(data))
    //         .catch(error=>console.error(error));
    // }

    // if (submitBtn!==null){
    //     submitBtn.addEventListener("click",function(click){click.preventDefault();submit()})
    // }
}