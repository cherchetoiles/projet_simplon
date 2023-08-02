window.addEventListener("DOMContentLoaded",()=>{
    const navbar = document.querySelector('nav');
    const links = navbar.querySelectorAll('.coursLinks');
    var isMouseOver = false;

    Array.from(links).forEach(link => {
        link.addEventListener("mouseenter",()=>{
            isMouseOver = true;
            defileTextStart(link);
        })

        link.addEventListener("mouseleave",()=>{
            isMouseOver = false;
            link.scrollLeft = 0;
            clearInterval(defileText);
        })
    });

    function defileTextStart(link) {
        let starting = 0;
        let i = 0;
        let nthScroll = 0;
        defileText = setInterval(() => {
            if (starting===50){
                if (isMouseOver) {
                    link.scrollLeft+=1
                    i+=1;
                    if (i===70){
                        i=0; 
                        if (link.scrollLeft === nthScroll){
                            link.scrollLeft=0;
                            starting=0;
                        }
                        nthScroll = link.scrollLeft;
                    }
                }
            }
            else{
                starting+=1
            }
        }, 15);
      }
})