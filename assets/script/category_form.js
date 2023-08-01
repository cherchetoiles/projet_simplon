window.addEventListener("DOMContentLoaded",() =>{
    const form = document.getElementById("form-category");
    const categoryLogoDropper = form.getElementsByClassName("drop_category_logo");
    const altCardPreview = document.getElementById("alt-card_preview");
    const notificationBox = document.getElementById("notificationSquare");

    const canvas = document.getElementById("canvas");
    const context = canvas.getContext("2d");
    context.imageSmoothingEnabled = false;
    context.willReadFrequently = true;
    context.getContextAttributes();

    const errorDico = {  1:"Remplissez les champs:<br>"
                        ,2:"Veuillez mettre des images en tant que logos de catégorie."
                        ,3:"Veuillez mettre des fichiers de moins d'1MB en tant que logos de catégories"
                        ,4:"Le titre de catégorie doit contenir moins de 64 lettres."
                        ,5:"Veuillez rentrer un code couleur au format hexadécimal en tant que couleur principale de catégorie"
                        ,6:"Veuillez sélectionner un thème parent correct."
                        ,7:"Erreur lors de l'upload des images"
                        ,8:"Erreur lors de l'insertion en base de données"};

    const fieldsNameDico = {"category_description":"Description de la catégorie",
                            "category_name":"Nom de la catégorie",
                            "theme_parent":"Theme parent",
                            "alt_category_logo":"Logo alternatif de la catégorie",
                            "category_logo":"Logo de la catégorie"};
    
    form.querySelector("[type=submit]").addEventListener("click",(e)=>{e.preventDefault();sendFormData()})


    form.querySelector("[data-coloris]").addEventListener("change",()=>{
        altCardPreview.style.backgroundColor=form.querySelector("[data-coloris]").value
    })
    
    form.querySelector("[name=alt_category_logo]").addEventListener("change",()=>{
        let imageUrl = window.URL.createObjectURL(form.querySelector("[name=alt_category_logo]").files[0])
        altCardPreview.querySelector("img").src=imageUrl;
    })   
    
    Array.from(categoryLogoDropper).forEach(elt=>elt.addEventListener("change",()=>{fileInputPrevisualiser(elt)}))

    function fileInputPrevisualiser(fileWrapper){
        let imageUrl = window.URL.createObjectURL(fileWrapper.querySelector("input").files[0])
        fileWrapper.style.backgroundImage = "url("+imageUrl+")";
        if (fileWrapper.querySelector(".CTA-logo")){fileWrapper.querySelector(".CTA-logo").remove()};
        let image = new Image();
        console.log(image)
        image.addEventListener("load",()=>{
            fileWrapper.querySelector(".used-color-container").replaceChildren();
            let uniqueColors = getCanvaPixelData(canvas,image);
            for (let i = 0;i<3;i++){
                let uniqueColor = uniqueColors[i].split(",");
                fileWrapper.querySelector(".used-color-container").appendChild(createColorRenderer(uniqueColor[0],uniqueColor[1],uniqueColor[2]));
            }
        })
        image.src=imageUrl;
    }
 
    function rgbToHex(red, green, blue) {
        red = parseInt(red);
        green = parseInt(green);
        blue = parseInt(blue);

        const rHex = red.toString(16).padStart(2, "0");
        const gHex = green.toString(16).padStart(2, "0");
        const bHex = blue.toString(16).padStart(2, "0");
        return "#" + rHex + gHex + bHex;
    }

    function createColorRenderer(R,G,B){
        let hex = rgbToHex(R,G,B);
        let colorRenderer = document.createElement("div");
            let colorVisu = document.createElement("div");
            let colorCode = document.createElement("span");
        
        colorRenderer.classList.add("flex","justify-between","gap-2");
            colorVisu.classList.add("w-5","h-5");
            colorVisu.style.backgroundColor = hex;
        colorRenderer.appendChild(colorVisu);
            colorCode.classList.add("mr-2");
            colorCode.innerHTML = hex;
        colorRenderer.appendChild(colorCode);
        return colorRenderer;
    }

    function getCanvaPixelData(canva,image){
        canva.width = image.width;
        canva.height = image.height;
        context.drawImage(image,0,0,canva.width, canva.height)
            // Obtenir les données des pixels
            const imageData = context.getImageData(0, 0, canva.width, canva.height);
            const pixelData = imageData.data;

            // Récupérer les couleurs uniques
            const colors = new Set();
            for (let i = 0; i < pixelData.length; i += 4) {
                const red = pixelData[i];
                const green = pixelData[i + 1];
                const blue = pixelData[i + 2];
                const alpha = pixelData[i + 3];
            
                // Ignorer les pixels transparents
                if (alpha !== 0) {
                const color = `${red}, ${green}, ${blue}`;
                colors.add(color);
            }  
            }
        console.log(colors);
        const uniqueColors = Array.from(colors);
    return uniqueColors;
    }

    function sendFormData(){
        let newCategoryData = new FormData(form);
        fetch("/admin-addCategory",{method: 'POST',body:newCategoryData})
        .then(response=>response.json())
        .then(data=>{if (!data.success){
            console.log(data);
            showError(data);
            }
        })
        .catch(error => console.error(error))
    }

    function showError(data){
        let error = document.createElement("div");
            let errorSpan = document.createElement("div");
        
        error.classList.add("py-px","px-2","bg-red","text-white","max-h-[400px]","text-sm","w-fit");
        setTimeout(()=>{error.classList.add("transition-all","duration-[5s]","opacity-0");
                        setTimeout(()=>{error.classList.add("!duration-[2s]","!max-h-0");
                                        setTimeout(()=>{error.remove()}
                                        ,2000)
                                        }
                        ,5000)},
                    200)
            errorSpan.classList.add("text-right");
            errorText = errorDico[data.error];
            if (data.errorData !== undefined){
                data.errorData.forEach(element => {
                    errorText=errorText.concat("-",fieldsNameDico[element],", <br>")
                });
                errorText = errorText.substring(0,errorText.length-6);
            }
            errorSpan.innerHTML = errorText
        error.appendChild(errorSpan);
        notificationBox.appendChild(error);
    }
})