window.addEventListener("DOMContentLoaded",()=>{
  let likeBtn = document.getElementById("like_button");

  likeBtn.addEventListener("click",()=>{
    fetch("/favTreat",{method:"POST",body:JSON.stringify({"lesson":likeBtn.dataset.lesson})})
      .then(response=>response.json())
      .then(data=>{
                    if (data.success){
                      let likeSpan = likeBtn.querySelector("span");
                      let likeNb = likeSpan.innerHTML;

                      if (data.action==="add") likeNb++;
                      else if(data.action==="delete") likeNb--;
                      
                      likeSpan.innerHTML = likeNb;
                      likeBtn.querySelector(".crack").classList.toggle("opacity-0")
                      likeBtn.querySelector(".crack").classList.toggle("opacity-100")
                      console.log(data)
                    }
                  })
                })

  })