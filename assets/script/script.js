{
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

    function changeUserStatut(requestValue,userId){
        let url = "/admin-changeUserStatut";
        fetch(url, {method:'POST'
                   ,body:JSON.stringify({"requestValue":requestValue,"userId":userId})                       
                   ,headers:{"Content-Type":"application/json"}})
            .then(response =>response.json())
            .then(data =>{ 
                if(data['success']){
                    let nodeToDelete = document.querySelector("[data-id='".concat(data['id_user'],"']"));
                    if (requestValue===1){
                        nodeToDelete.classList.add('translate-x-full','!opacity-0');
                    }
                    else{
                        nodeToDelete.classList.add('-translate-x-full','!opacity-0');
                    }
                    setTimeout(
                    ()=>{nodeToDelete.classList.add('!max-h-0','!p-0');
                        setTimeout(()=>{nodeToDelete.remove()},600);
                        },
                    300)     
                }
            }
            )
    }

    function openAndCloseModal(modal){
        modal.classList.toggle("hidden");
        modal.classList.toggle("flex");
        let bg = document.createElement("div");
        if (document.getElementById("backgroundFilter")===null){
            bg.classList.add("bg-black","opacity-50","fixed","z-10","top-0","left-0","w-screen","h-screen");
            bg.id="backgroundFilter";
            document.body.appendChild(bg);
        }
        else{
            document.getElementById("backgroundFilter").remove();
        }
    }

    function acceptLesson(status,lesson_id,nodeToDelete){
        let url = "/admin-changeLessonStatus";
        fetch(url, {method:'POST'
                    ,body:JSON.stringify({"requestValue":status,"lessonId":lesson_id})                       
                    ,headers:{"Content-Type":"application/json"}})
            .then(response =>response.json())
            .then(data =>{
                console.log(data);
                if(data['success']){
                    console.log(nodeToDelete);
                    if (status === 1){
                        nodeToDelete.classList.add('translate-x-full','!opacity-0');
                    }
                    else{
                        nodeToDelete.classList.add('-translate-x-full','!opacity-0');
                    }
                    setTimeout(
                    ()=>{nodeToDelete.classList.add('!max-h-0','!p-0');
                        setTimeout(()=>{nodeToDelete.remove()},600);
                        },
                    300)     
                }
            })
    }

    document.addEventListener("DOMContentLoaded",()=>{
    let addBtn = document.getElementById("addBtn");
    let closeModalButtons = document.getElementsByClassName("close-modal");

    let sideBarContent = document.getElementById("crudSideBarContent");
    let sideBarOpenBtn = document.getElementById("openCrudSideBar");
    let mainContent = document.getElementById("mainContent");
    let hiddenBlockElt = document.getElementById("hiddenBlockElt");

    let dashboardBtn = document.getElementById("dashboard");
    let lessonBtn = document.getElementById("crudLesson");
    let userBtn = document.getElementById("crudUser");
    let categoryBtn = document.getElementById("crudCategory");
    let themeBtn = document.getElementById("crudTheme");
    // ajax formulaire ajout de leçon
    const submitBtnAddVideo = document.getElementById("submit_video");
    
    const alert_video = document.getElementById("alert_video");
    if (alert_video!==null){
        const alertTxt_video=alert_video.querySelector("#error_text");  
    }

    
    // changement de tab
    const tabIndicator = document.querySelector("#tabIndicator");
    const addModal = {"crudLesson":document.getElementById("form-video"),"crudCategory":document.getElementById("form-category")};
    const btnContent = {"crudLesson":'Ajouter un cours',"crudUser":'Ajouter un utilisateur',"crudCategory":'Ajouter une catégorie',"crudTheme":'Ajouter un thème'};
    console.log(addModal);
    // modal
    let descModal = document.getElementById("showDesc");
    var delModal = document.getElementById("delModal");
    var delBtn = document.getElementById("acceptDel");

    var activeModal = addModal.crudLesson;

    var activeSection = window.location.pathname.split("-")[1];

    if (submitBtnAddVideo!==null){
        submitBtnAddVideo.addEventListener("click",function(click){click.preventDefault();submit_video()})
    }
    if (delBtn!=null){
        delBtn.addEventListener("click",()=>{deleteLesson(delBtn.dataset.id)});
        }
    if (lessonBtn!=null){
    lessonBtn.addEventListener("click",()=>{changeContent("getAllLessonCard","crudLesson")});
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
    if (dashboardBtn!=null){
        dashboardBtn.addEventListener("click",()=>{changeContent("getLatestNews","dashboard")});
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
        addBtn.addEventListener("click",function(click){click.preventDefault(),console.log(activeModal),openAndCloseModal(activeModal)})  
    }

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


    function submit_video(){
        let videoData = new FormData(addModal.crudLesson);
        fetch("/index.php?action=addVideoTreat",{method: 'POST',body:videoData})
            .then(response=>response.json())
            .then(data=>()=>{changeAlert(data),console.log(data)})
            .then(data=>{if (window.location.pathname === "/admin-crudLesson"){
                            changeContent("getAllLessonCard","crudLesson");
                        }})
            .catch(error=>console.error(error));      
    }

    function changeAlert(newText){
        alert_video.classList.remove("duration-[3000ms]");
        alert_video.classList.remove("opacity-0");
        alert_video.classList.remove("-z-10");
        alert_video.classList.add("z-30");
        alert_video.querySelector('span').innerHTML=newText;
        setTimeout(()=>{alert_video.classList.add("duration-[3000ms]");alert_video.classList.add("opacity-0");setTimeout(()=>{alert_video.classList.remove("z-30"),alert_video.classList.add("-z-10")},3000)},1000);
    }
  
    async function changeContent(dataLocation,newUrl){
        tabIndicator.replaceChildren();
        
        let svg = document.getElementById(newUrl).querySelector("svg").cloneNode(true);
        svg.setAttribute("width","50");
        svg.setAttribute("height","50");
        Array.from(svg.children).forEach(elt => {elt.setAttribute("stroke","red"); 
                                                if (elt.getAttribute('fill')!==null){
                                                    elt.setAttribute("fill","red");
                                                    elt.setAttribute("stroke","transparent");
                                                }});
        tabIndicator.appendChild(svg);

        let title = document.getElementById(newUrl).querySelector("span").cloneNode(true);
        tabIndicator.appendChild(title);

        console.log(addModal[newUrl]);
        console.log(newUrl)
        if (addModal[newUrl]!==undefined){
            activeModal = addModal[newUrl];
        }

        if (btnContent[newUrl]!==undefined){
            addBtn.classList.remove("hidden");
            addBtn.innerHTML = btnContent[newUrl]
        }
        else{
            addBtn.classList.add("hidden");
        }

        mainContent.innerHTML="";
        window.history.pushState(100,"crud","admin-".concat(newUrl));
        activeSection = newUrl;
        fetch("/index.php?admin="+dataLocation)
            .then(response => response.json())
            .then(data => {data['data'].forEach(element => { 
                            let newNode=document.createRange().createContextualFragment(element);
                            mainContent.appendChild(newNode);  
                            }
                        )
                        if (data['latestLesson']!==undefined){
                            data['latestLesson'].forEach(element =>{
                                    let newNode = document.createElement("div");
                                        let container1 = document.createElement("div")
                                            let coverAndUser = document.createElement("div")
                                                let cover = document.createElement("img");
                                                let user = document.createElement("div");
                                                    let frame = document.createElement("div")
                                                        let userProfilePicture = document.createElement("img");
                                                    let userName = document.createElement("span");
                                    
                                            let titleAndDesc = document.createElement("div");
                                                let title = document.createElement("span");
                                                let desc = document.createElement("span");
                                                let catBackground = document.createElement("img");

                                        let acceptOrDecline = document.createElement("div");
                                            let acceptBtn = document.createElement("div");
                                            let declineBtn = document.createElement("div");

                                    newNode.classList.add("max-w-sm","lg:max-w-none","flex","flex-col","justify-between","lg:flex-row","items-center","lg:items-start","bg-white","rounded-lg","opacity-100","max-h-96","transition-all","duration-300","flex-1")
                                        container1.classList.add("flex","h-full");

                                            coverAndUser.classList.add("flex","flex-col","rounded-l-lg");
                                                cover.classList.add("w-full","lg:h-28","rounded-tl-lg");
                                                cover.src="/assets/img/lesson_miniature/".concat(element.lesson_cover);
                                            coverAndUser.appendChild(cover);
                                                user.classList.add("flex","p-3",'bg-red',"items-center","gap-2","rounded-bl-lg");
                                                    frame.classList.add("overflow-hidden","w-12","h-12","rounded-full");
                                                        userProfilePicture.src = "/assets/img/user_avatar/".concat(element.user_avatar);
                                                    frame.appendChild(userProfilePicture);
                                                user.appendChild(frame);
                                                    userName.innerHTML = element.user_name.concat(" ",element.user_surname);
                                                    userName.classList.add("font-bold","text-white")
                                                user.appendChild(userName)
                                            coverAndUser.append(user);
                                        container1.appendChild(coverAndUser)

                                            titleAndDesc.classList.add("flex","flex-col","max-h-[184px]","h-full","aspect-square","relative","cursor-pointer");
                                                title.innerHTML = element.lesson_title;
                                                title.classList.add("font-bold","text-lg","z-20","ml-2","line-clamp-2","break-words");
                                            titleAndDesc.appendChild(title);
                                                desc.innerHTML = element.lesson_description;
                                                desc.classList.add("line-clamp-5","text-sm","ml-4","mt-4","z-20");
                                            titleAndDesc.addEventListener("click",()=>{descModal.querySelector("span").innerHTML = element.lesson_description,openAndCloseModal(descModal)})
                                            titleAndDesc.appendChild(desc);
                                                catBackground.src = "/assets/svg/categories/".concat(element.category_logo);
                                                catBackground.classList.add("absolute","h-full","top-0","right-0","left-0","bottom-0","z-10","opacity-20");
                                            titleAndDesc.appendChild(catBackground)
                                        container1.appendChild(titleAndDesc);

                                    newNode.appendChild(container1);

                                        acceptOrDecline.classList.add("flex","lg:flex-col","justify-around","h-full","py-10","mx-4","text-white","text-center");
                                            acceptBtn.classList.add("bg-green-600","py-1","px-4","rounded-md","cursor-pointer");
                                            acceptBtn.innerHTML = "Accepter";
                                            acceptBtn.addEventListener("click",()=>{acceptLesson(1,element.lesson_id,newNode)});
                                        acceptOrDecline.appendChild(acceptBtn);
                                            declineBtn.classList.add("bg-red","py-1","px-4","rounded-md","cursor-pointer","text-center");
                                            declineBtn.innerHTML = "Decliner";
                                            declineBtn.addEventListener("click",()=>{acceptLesson(0,element.lesson_id,newNode)});
                                        acceptOrDecline.appendChild(declineBtn);                       
                                    newNode.appendChild(acceptOrDecline);

                                mainContent.appendChild(newNode);
                            })
                        }
                        })
            .catch(error=>console.error(error))
    }

    function deleteLesson(id){
        fetch("/index.php?admin=deleteLesson&id="+id)
            .then(response => response.json())
            .then(data => console.log())
        changeContent("getAllLessonCard","crudLesson");
        openAndCloseModal(delModal);
    }

    // router
    if (activeSection === "dashboard"){
        changeContent("getLatestNews","dashboard");
    }
    if (activeSection === "crudLesson"){
        changeContent("getAllLessonCard","crudLesson");
    }
    if (activeSection === "crudUser"){
        changeContent("getAllUserCard","crudUser");
    }
    if (activeSection === "crudCategory"){
        changeContent("getAllCategoryCard","crudCategory");
    }
    if (activeSection === "crudTheme"){
        changeContent("getAllThemeCard","crudTheme");
    }
})

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


// ajax formulaire modif profil
{
    const submitBtnUpdateProfil = document.getElementById("submit");
    const formUpdateProfil = document.getElementById("form-update");
    const alert = document.getElementById("alert");
    const alertTxt=document.getElementById("error_text")

    function submit_new_data(){
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
        alert.classList.add("z-30");
        alertTxt.innerHTML=newText;
        setTimeout(()=>{alert.classList.add("duration-[3000ms]");alert.classList.add("opacity-0");setTimeout(()=>{alert.classList.remove("z-20"),alert.classList.add("-z-10")},3000)},1000);
    }

    if (submitBtnUpdateProfil!==null){
        submitBtnUpdateProfil.addEventListener("click",function(click){click.preventDefault();submit_new_data()})
    }
}