function openAndCloseModal(modal){
    modal.classList.toggle("hidden");
    modal.classList.toggle("flex");
    
    let bg = document.createElement("div");
    if (document.getElementById("backgroundFilter")===null){
        bg.classList.add("bg-black","opacity-50","backdrop-blur-md","fixed","z-40","top-0","left-0","w-screen","h-screen");
        bg.id="backgroundFilter";
        document.body.appendChild(bg);
    }
    else{
        document.getElementById("backgroundFilter").remove();
    }
}
// demande pour être créateur
{
    let creator_role_request_btn = document.getElementById("creator_role_request");
    
    function submit_creator_request(){
        fetch("/reinitializeUserStatut")
            .then(response => response.json())
            .then(data => 
                {
                if (data['success']){
                    creator_role_request_btn.classList.add("animate-in_and_out");
                    setTimeout(()=>{document.getElementById("creator_role_request").remove()},1000)
                    }
                else{
                    creator_role_request_btn.classList.add("animate-shake");
                    setTimeout(()=>{creator_role_request_btn.classList.remove('animate-shake')},500);
                    }
                }
            );
    }

    if (creator_role_request_btn !== null){
        creator_role_request_btn.addEventListener("click", function(click){click.preventDefault();submit_creator_request()})
    }
    
}
// formulaire d'ajout de vidéos
{
    let openFormModal = document.getElementById("openFormModal");

    if (openFormModal !==null){
        openFormModal.addEventListener("click",function(click){click.preventDefault();openAndCloseModal(document.getElementById(openFormModal.dataset.target))})
    }
}
// formulaire de changement de données
{
    let editBtn = document.getElementById("editBtn");
    let editModal = document.getElementById("form-update");


    if (editBtn!==null){
        editBtn.addEventListener("click",function(click){click.preventDefault(),openAndCloseModal(editModal)})  
    }
}