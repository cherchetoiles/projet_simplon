<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="dist/output.css" rel="stylesheet">

    <!-- DAISY UI -->
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Mon Profil</title>
    
</head>
<body class="flex flex-col w-full h-auto">
<?php include('view/navbar.php')?>
<h1 class="hidden">Profil</h1>
<!-- HEADER -->
<div class="container flex justify-center pt-5 pb-10 mx-auto my-auto border-b border-solid lg:pt-16 lg:w-11/12 xl:w-7/12 border-stroke">
   <!-- AVATAR -->
    <div class="px-2 md:w-1/5">
        <img src="assets/img/steven.png" alt="Photo de profil de Steven" class="w-20 h-20 rounded-full sm:w-28 sm:h-28 md:w-36 md:h-36 lg:w-44 lg:h-44">
    </div>
    <div class="flex flex-row justify-between sm:mt-2 lg:w-4/5">
        <div>
            <div class="flex flex-col justify-center">
                <!-- NAME AND JOB -->
                <h2 class="font-body text-xl md:text-[28px] font-medium tracking-wide">Steven Blombou</h2>                
                <p class="text-lg font-normal tracking-wide md:pt-1 md:text-xl font-body">Apprenti Développeur Web</p>
            </div>
            <div class="flex justify-between mt-1 md:mt-9">
                <!-- LIKE AND POST NUMBRE -->
                <p class="tracking-wide lg:text-lg"><strong>12 </strong>publications</p>
                <p class="tracking-wide lg:text-lg"><strong>47 </strong>j'aime</p>
            </div>
        </div>
        <div>
            <!-- UPDATE PROFIL -->
            <a href="?action=test" class="bg-[#F5F5F5] hidden lg:flex text-center px-5 py-2 rounded-md text-lg lg:text-xl"><p>Modifier le profil</p></a>
        </div>
    </div>
</div>

<!-- TABLE -->
<div class="container mx-auto bg-white lg:bg-none">
    <div class="absolute bottom-0 flex justify-center w-full py-4 text-sm font-semibold tracking-wide uppercase bg-white border-t border-solid lg:bg-none border-stroke lg:border-none lg:static">
        <!-- COURS OF CREATOR -->
        <a href="" class="flex items-center w-auto mx-4">
            <img src="assets/svg/lesson.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour voir mes cours en ligne">
            <p class="hidden lg:flex">Mes cours</p>
        </a>
        <!-- FAVORIS -->
        <a href='' class="flex items-center w-auto mx-4 mr-24 lg:mr-0">
            <img src="assets/svg/fav.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour ajouter aux favoris" class="w-3 h-3">
            <p class="hidden lg:flex">Mes favoris</p>
        </a>
        <!-- HISTORIQUE -->
        <a href="" class="flex items-center w-auto mx-4 ">
            <img src="assets/svg/time.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour voir mon historique">
            <p class="hidden lg:flex">Mon historique</p>
        </a>
        <!-- SETTING -->
        <a href="?action=test" class="flex items-center w-auto mx-4 lg:hidden">
            <img src="assets/svg/parm.svg" class="w-6 h-6 mr-1 lg:h-4 lg:w-4" alt="icon pour changer mes données">
        </a>
        <!-- CREATE FOR CREATOR -->
        <div class="absolute bottom-0 flex justify-center lg:bottom-auto lg:translate-y-[-31%] lg:right-24 xl:right-80 ">   
            <a href="?action=addVideo" class="flex items-center justify-center rounded-full lg:w-auto w-14 h-14 bg-red lg:bg-transparent">
                <svg width=30 height=30 class="w-7 h-7 lg:w-4 lg:h-4 lg:mr-1 stroke-white lg:stroke-black" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.8252 5.0189H18.2147M18.2147 5.0189H21.6042M18.2147 5.0189V8.40841M18.2147 5.0189V1.62939" stroke-linecap="round"/>
                    <path d="M1.32227 15.1877C1.39451 14.4533 1.55778 13.9589 1.92677 13.5899C2.58862 12.928 3.65384 12.928 5.78427 12.928C7.91471 12.928 8.97993 12.928 9.64178 13.5899C10.3036 14.2517 10.3036 15.3169 10.3036 17.4474C10.3036 19.5778 10.3036 20.643 9.64178 21.3049C8.97993 21.9667 7.91471 21.9667 5.78427 21.9667C3.65384 21.9667 2.58862 21.9667 1.92677 21.3049C1.57723 20.9553 1.4123 20.4933 1.33447 19.8212" stroke=" stroke-linecap="round"/>
                    <path d="M1.2666 5.01934C1.2666 2.88891 1.2666 1.82369 1.92844 1.16184C2.59029 0.5 3.65551 0.5 5.78595 0.5C7.91639 0.5 8.98161 0.5 9.64345 1.16184C10.3053 1.82369 10.3053 2.88891 10.3053 5.01934C10.3053 7.14978 10.3053 8.215 9.64345 8.87685C8.98161 9.53869 7.91639 9.53869 5.78595 9.53869C3.65551 9.53869 2.59029 9.53869 1.92844 8.87685C1.2666 8.215 1.2666 7.14978 1.2666 5.01934Z"/>
                    <path d="M13.6943 17.4474C13.6943 15.3169 13.6943 14.2517 14.3562 13.5899C15.018 12.928 16.0832 12.928 18.2137 12.928C20.3441 12.928 21.4093 12.928 22.0712 13.5899C22.733 14.2517 22.733 15.3169 22.733 17.4474C22.733 19.5778 22.733 20.643 22.0712 21.3049C21.4093 21.9667 20.3441 21.9667 18.2137 21.9667C16.0832 21.9667 15.018 21.9667 14.3562 21.3049C13.6943 20.643 13.6943 19.5778 13.6943 17.4474Z"/>
                </svg>
                <p class="hidden lg:flex">Ajouter</p>
            </a>
        </div>
    </div>
    <!-- TABLE FILE -->
    <div class="w-10/12 mx-auto my-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">

        <!-- LESSON CARD -->
            <div class="flex justify-start w-[323px] h-[182px] px-5 py-4 text-white bg-cover bg-[url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhIQEhIVFRIVFRAQFRAQEA8PDw8QFhUWFhUVFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OGhAQGy0dHSUtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAADBAABAgUGB//EADYQAAIBAwEFBgUDBAIDAAAAAAABAgMRIQQSMUFRYQUicYGRoRMyscHwBtHxFFJi4SNCcoKy/8QAGQEBAQEBAQEAAAAAAAAAAAAAAQIAAwQF/8QAJREBAQACAQQBBAMBAAAAAAAAAAECESEDEjFBEwQiUWEUcbEy/9oADAMBAAIRAxEAPwD26iaSLSNpG2iRlRCKJEgiRO1yKSNpEUTaRNqtBVVgWSHKsQKgbZ0JSiF2SUo4CJE2qkY2S1E2kWok7VphREdDRtWrPg9n1tk6VhPsVXg5c5z37/mYb4rWHVE2omlEqrKyI2rTSibjErTu6uHjEGZjE2oG4xNqJhsvKmbp0w2yaSHQuQWyU4hrFOJtDuAcTDiMOJhoFSl3Ew4jEog3ExBcTLiGaMNCAZRBuIw0YaGVi0ogpRGpRBSiXKmwrslhdkhW06KwCJAtO7oZSOlrnFJG0i4xKr3UW1wyTtUjSRtIBpqu0kxpImqjE1gFYZlHANQDamqaCKJKcSTZNpWomdPVU1tRd1eUb9U7M3TyJ9iUHCEoPhVrvylUlJezD0x6wPR0dmNusvqMpFwiTsoomatO4SKLaArowskGiiRRtIybUijdiJFlRFqiyEEIQhDMpow0EMsKZQmjEkFaMtErlAaM2CtGWjKCaBtBmimhYCSBSiMNGJRGUFtkgXZIOw4+h3LqkzoQicrQSwlxj3fbHszsUzrlXLGLjE043Vi0iydr05egvCcqb3XuvBnVihHV92anwxcZnVvHaXibK75bGa4HsVskpVE0mbRG1IkCqLIwgco5DZXRWCUI5nfnfxVkFpRwYhL/AJHH/GL6b2vsBXKtFSjTv3pKUlHi4xttPwW1H1QeCOPSqwqavairypQ1Gnb4J3083/8AVv8A1Z2oo1mhLtSRNnJqxtIk7aSNpGUjSKjnVospFlJqEIQwQhCGZCiyjUxmRhm2ZZC4w0YaCMpoFBNGWgtjLQkJow0FaMtGYGxQTZLHYeYUtmafBxV/Ffz7HRoahWPEdpdvR2U09wtpf1Pvzy+h6/iteT5pH0X+oQGtrUuJ4V/qpczna/8AUzawxn0+Rv1GL3+o7Qi4vPAV7N7VTi02t7R8wqfqKbxd2BPtucdzL/j+kfyL50+v6HtKNnG+7qO6ftCM0pReGfHqXbtSCUufUb7N/UbpRUW+b9Xc536e+nSdf8x9hp10wjqI+fdm/qyL3s9Bpu2oS4nDLp5Yu+HUxyel01baVwySvfpY4nZ2tVt63s6MNSro5V004mlgqPaNWMns/Hcq1JJ4qN0qcamN+0nRT5WZ6yJ5PtWUI9oaKo5NSlDU0UldqbspJPgt8n6HqoTHK+KiTW2rG0YUjaZLVpFopFopK0WUQQ0QpMlxCyiNlXMySKTLF62Hfg/Z8GTaqTY7MszGpf7+JmpVSyw2ZK0yjKqJ5RTmG1SVbMtmJVQFTUJBtWh5MHKYnPWLmJajtSMd7Gbra06u2UeJrfq1bTtlX3kOnx5/hHyYPki1ktzdxtO8cb7fyc17x6OLH0svL5+M4K1JPmS43qtLaMZqzjLOOHRiKLmW03HTcUbluJAjRtnRvUV1ON0rN2m+Hffz26bVwM3dJ9CVmnJ2+W81BXvaG1Jpe5lRJisuWoSa3Mfo6+ot0hBBYDdJjv8AZ/6inTWzxu3c72j/AFfu2r7zxMYYuM6eO/wZwy6eF9O2PUznt9CrduxqS08+61Cpd3+aO1FxUk/O1v8ALoes0/aCfE+RaKOfJnUoa6pDKk/M8mfR51Hqw6vG6+q09XF4uMxqHzXsrtqak28nptN23F/7OGWOWLrO3Lw9RGZvaORp+0E+I3DVLmEzTemd2ibQq9QuZh6tcx74Pjp3aL2hD+sXMzPXJccG72+On5MFGpbD8mI1NcAq6y6tYLkqdN15VDMpqxwamvl9gM+05Buq+N2K+pUGpX7rtGXR8H9i56tczy2t10pJrg00/A5T182tlt3jZX/uXMqYWtdR6bU9sxpVIxb7kr54KQap2vC19pep4HV1W8N3XUTjWey4t7t2eB1nR3PLnepqvb6r9R01/wBjja/9T3xE8xXe533+wrUqHbHoYuWXWydXVfqGq9zscrU9o1Jb5MVnME5HpxxxniPNlllfLTqPmQE2UWlxbbh+tiKfgJxhj8/OA9ON4eFjWtj4rNKreMoN2XzLrJCkY73yGoJWXPj4FVtLZON8+1gl02tgJ8RmaTs0Uo2pqm1lO6l0fAujHBtmzXAUVZoY+GUqeRmUMJmtGi2wbgguyEhSwTa2mqNLA3pqefX6F6Slg6Wk012jnlnp1xw2z2fTyHdO+AumiovPMZhTy/FnDLPl6McONMaSjZHRoozSgN06Zxyz27Y4aEotjVOs094GEQqtjmcbXWQ4qz5mlNi8ZW3m6FXain48GsXw881ZkkwpceWfIHFyk7tOMVui1ZyfN8l0B2beXaOHFJ/N1kNDttMymClMuYGTNttFNbp1N7V5KX90JuMvPg/MSWonTxV70U7fGTSduDnHhyusbjqSQpWTXVcU+R0mXqouPuA15iGqsscXn89A89PKPeh3oO16bdnBc4Pdb/H05HF19VyvOF26bs1/dFP6r9zrhNueeWpy3qOYjVlxGqtRSjdcUKtXR2lcciNfffg8ApMZm+84vkmvuDnA6yuFhRoxIO0gMmdIkOxDRB2nRKlRDqPda/MGljJmUmpWe6+/oybTAlTKjF3TebY/YZsbpQzbmFo0XUr8OCN06ZrULZt1x5h4SDuVfLMKYb4WCRWbD1Ol3Scs9Lxx3sjCktwxSoBo0sjHwcEXMzALTU736M6dJ7KT8FYV0ke/JdIv7DKj3uiXucsstu2M1BK2Gsb3Hyyjp06KQlHfGXh/J0HL6L6WOGWTtjppKxdWtsypxvbbk4+NoSlb2QKVQDrZPZjK2YzpyTu01eSjLx7rat1JnldvDrJmnmwDbIqhzVsau1Luc7bSTt3He+etreodtNW3LdjkIU611e+933cOHjj6mnXMO6eT/wAW1umA8dQjjfHCqqOmmZ+dYBKqhWdYWnXGQXN0fjoFOoc/4wSNS+B0O8LVyaby1BppqO9PmJ6eCjdrKe/qG1mqjHDZz6epjweG/Q7Yy9rnllJSc/8AjqbN+5O7X+MuRclbIXU0k88ncFLO/kde7bh4pbVtOpFJWtDLv8zvczNC9eCTjK/HK52GS/GnO3dITWWLzkN1LZEIyurnaVzotyA7kHYZ2jFRN7jEX7BksXQQxqnLCGYSe8SpsZoyItbZicU8vmaqQxjiCeVs3/LEc3bwJ2rO8jQj3m+o/RnvXQQoTNw1NpexN5isMtR0aXMbSRzaFWzXIe+IccnTHNUVs1E+DTj57xmNhT4l3HowrqWJuzM+DVCWF5Bqs8242b8lKSfn+zOZpdRfHG7+gXVSzTk38vxF4vvfuT2/ce/g38SxK1bahKOMprO6/B+ojWr4uLQ1JUw3yPl09Jp9TtxaeJJtK3/aPBslObucvT1spp8r25rA663dTe93tztuuccsdV1me4ZrVM4/GLSritWvYRq6ovDp7Rl1HYjXNrUdThqu7+ht1y700/I7M6wpU1GRX472WB2jY4Nl1Nnf6gueqORWrg46i50nT25/I6s6mAVNxxhA1V7oo6rTsMx4XctTYs04vDx1KjV4tegKrq+DFJaqzG47cbnoTVWcnn8aKhVxnesA33ouX8oX+Lv8fVFzxpNrFeebC7f3+oWo83Bzj7nTG8D0r4pAbpkK2nbNOQxFWuJXGtLO8euSVYeV3y/X1yHov7CileTXPHkR1Fi2/c115/n3Cw+z9SeU+F8+AOrPDQGnUvfwI5uVvKJzx/6ot3Ro1bFwlfIjUmy6VayZ0sG3Z+Nb2D/1OLeBylUyutgnxDj2nboxqZvfh7m56q+45yq7SaW97ujRqD9cYJnmt3OnpKu7xeTNSvfjyFoSx5lz3b+H3GTkzMxGMpJNK+L2WbAFPNmC0ldxleLzwawy62pcneSz/ckk/Oxers7mnX0EFOTSdmrPPK2Qteo9prl3VfkjkaWvsyvfLu/Jbvr7DT1yk2pfNz4HHLG92/S5lNaM62vtQut6w+qOZJvDCyebc8AqtX/q+B1w1OI3F5puPeSfkCrT4Cq1jWAFSu3IqYpysdunNbIrKvwE/wCqe5GJ1Uur6BMBctjzqZF5VLMx8ZSdt2HbxBSdzpOEU/V1F7W8zVWomr9DkU6veNVquL3xd49B7V932i6vUXsrWt7i3xv2Aud34k2+A2RzvNNUa29eOehKkvpnlcBS8fI0p2WfAjwynU/fy4mqlVbWN3AFUw7riZniK52LmjPY7l0IKraKMAqm9cnlB9Lhv0BueOjvv4P7cDWmldX47mGP7OPlbdpX6XMTWYvgTUSys7vyxU5d1eKE+zFCWbdGSlLNlx+qBxqWkDhOzTOUn3b/AEludS5hsxUllvmZUzqxyFbC8AkqghF7zcZ8PxE9pNxrWfVDs6t4wkuC2X5f6fscqEldNq64roMTTjtQvdJqUZLdaSwRcOdg4tRiwX42H/4/dHIlU3BI1Hl/4srtg0ap1clOq9pteLEqc8N8vdM18T3HXJdChrbbW0r33dGZo1rO79RG+5ceRar2w93Ee07diGo5+KZnUVs34NbhGnVtfiuHQFKtuOfbydn41dl54YAzlm4KrVvFPisPrHh+3mC+K4q3vyLkGzClyZUqis+YltWYNzzcrQObVs3CQ1CWGsMTq17tErVe6vzcGmEjK0738C9RO+01zTt14iu1nzNOXzeBVPpqMks3/ktSv45FlvGZJYfmGQYbasxic+7bivoAk8eoOVR3zuDywm3d2fB+xdWXd37rC8ZZT/GjcMXXj/odNBIanHAgpUw2iDqMJTzg3p3l/mReL2Xv54D6Z5uHs4+VVJZNSXAqrlspPcLflKsrTXp7EUvoSqru5mMck+gt7jMeIVR4GEt/P/YskZO9/BmmirW9CmzFr4galU+ZPxx7/uJbVmM0Zq6vueDWcMlV7g0pb2+VvYDU+W/L6Eh8vqZlQnZetyOW4DLhzYdrGd/IdM1GXExUeSSeDKkaAehUtbk/oyS3+v1sBUt1twSMHvfgurJvHJMNKPebxuS5gJSv4lValwMHlvluHH9s3J4MbRmbBt7ipAM5pBqcrqXr16iUy6c7fcbGFlL9yRnn2MP2RhuwaYSUvsFhO6Fr5LpSt9DWcMbWFB89pP2B6hWfT6BXTXwYSbaalUW7e8WQCE020+K38nwOeP5/v/Tplyzc1KWV6AYrJqT4l6ArfS/UgJVSE6rMX4jFFkIWYJPn5Mw2QhLVJOzswkUQgBbWAcJfsQhmSS4FXtn8xvIQ0LMlv8d/QkOHR2+5CFM3t4a9CoTx6EIaBmEbtMPUf7lkC0sSASkQg4hKbCzqexCDZyQXPiEirW6v2LIa+AC/uVyKIVCzKRLZ9PQhBZuo7Y43+hlvjzLIEDL4eASnx9SEJpGqVnsKHDa2vOwsuPhYhAxgRO+TTW/yIQazCiQhCm2//9k=')] rounded-xl flex- lesson bg-blur">
            </div>

            <!-- CLICK CARD -->
            <div class="flex justify-start w-[323px] h-[182px] px-5 py-4 text-white bg-cover odd:bg-red even:bg-black/40 rounded-xl flex- lesson bg-blur">
            <!-- LOGOWHITE+TITLE+DESC -->
                <div class="flex flex-col justify-start font-body">
                    <img src="assets/svg/categories/white/html.svg" alt="Logo hmtl" class="w-12 h-auto">
                    <h2 class="mt-1 text-sm font-semibold">Apprendre le HTML</h2>
                    <p class="my-1 text-[12px]">Lorem ipsum dolor sit amet consectetur lorem  dolor sit amet consectetur adipisicing...</p>
                    <!-- NUMBER DIFFICULT+LIKE+VIEW -->
                    <div class="flex text-[12px]">
                        <div class="flex mr-3">
                            1 <img src="assets/svg/difficult/1.svg" class="w-3 h-auto ml-1" alt="difficult">
                        </div>
                        <div class="flex mr-3">
                            1 <img src="assets/svg/iconlike.svg" class="w-3 h-auto ml-1" alt="like">
                        </div>
                        <div class="flex">
                            1 <img src="assets/svg/view.svg" class="w-3 h-auto ml-1" alt="view">
                        </div>
                    </div>
                </div>
                <div class="flex items-start justify-start">
                    <a href="">
                        <svg width="24" height="24"  class="duration-300 hover:stroke-blue stroke-white" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 8.5C8.90524 8.5 7.76142 8.5 11.6667 8.5M11.6667 8.5L9.16667 6M11.6667 8.5L9.16667 11"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.5 1.93648C5.52961 1.34088 6.725 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15C4.13401 15 1 11.866 1 8C1 6.72499 1.34088 5.52961 1.93648 4.5" stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
<?php include('view/footer.php')?>
</body>