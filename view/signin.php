<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="dist/output.css" rel="stylesheet">
    
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Connexion à K-ZEL Code</title>
    
</head>
<body class="flex justify-center w-full align-middle bg-gray-bg">

<div class="flex h-auto m-2 bg-white rounded-4xl drop-shadow-2xl">
    <!-- RIGHT SECTION DESKTOP -->
    <div class="flex flex-col items-center justify-center w-screen text-center">
        <h1 class="py-16 font-sans text-5xl font-bold">Connexion</h1>
        <!-- FORM -->
        <form method="POST" action="" class="px-1 mb-12">

            <div class="flex flex-col">
                <div class="flex">
                    <img src="assets/svg/User.svg" class="w-5 h-auto mr-6">
                    <input type="email" name="email" placeholder="Votre adresse mail" class="text-xl font-extralight placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                </div>
                
                <div class="w-full mt-1 h-[1px] rounded-full bg-gray-dark"></div>

                <div class="flex mt-9">
                    <img src="assets/svg/Pass.svg" class="w-4 h-auto ml-1 mr-6">
                    <input type="email" name="email" placeholder="Votre mot de passe" class="text-xl font-extralight placeholder:font-ligth placeholder:text-gray placeholder:font-body text-body">
                </div>

                <div class="w-full mt-1 h-[1px] rounded-full bg-gray-dark"></div>

                <div class="flex mt-10 text-black">
                    <input type="checkbox" name="save" value="" class="accent-red stroke-black"><p class="ml-5 text-base font-extralight font-body">Se souvenir de moi</p>
                </div>
                
                <div class="flex items-center justify-center">
                    <div class="flex items-center h-12 mt-10 rounded-lg w-52 bg-red hover:bg-white hover:border-red">
                        <a href="" class="m-auto font-sans text-base text-white">Se connecter</a>   
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <div class="flex items-center h-12 my-1 border-[1px] border-solid rounded-lg border-red w-52">
                        <a href="" class="m-auto font-sans text-base text-red">S'inscrire</a>   
                    </div>
                </div>

            </div>

        </form>
    </div>
    <div></div>
</div>
<p></p>
</body> 
</html>