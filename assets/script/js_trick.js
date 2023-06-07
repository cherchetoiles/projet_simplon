function allJs(){
    let video = document.getElementById("video");
    let sideMenu = document.getElementById("sideMenu");

    console.log(sideMenu);
    console.log(video.clientHeight)
    sideMenu.style.height = video.clientHeight
}

window.addEventListener("load",()=>{allJs()})
