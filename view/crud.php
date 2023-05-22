<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body class="bg-gray-bg h-full">
    <nav class="flex flex-col w-full -translate-x-full relative p-8 md:max-w-sm bg-white h-screen font-body" id="crudSideBarContent">
        <img src="assets/svg/logo.svg">
        <div class="mt-20 flex flex-col px-3">
            <div class="flex items-center text-gray-dark text-2xl gap-3 py-3">
                <img src="assets/svg/dashboard_icon.svg" class="w-8">
                <span class="leading-[0px]">Tableau de bord</span>
            </div>
            <div class="flex items-center text-gray-dark text-2xl gap-3 py-3">
                <img src="assets/svg/cours.svg" class="w-8">
                <span class="leading-[0px]">Cours</span>
            </div>
            <div class="flex items-center text-gray-dark text-2xl gap-3 py-3">
                <img src="assets/svg/crud_user_icon.svg" class="w-8">
                <span class="leading-[0px]">Utilisateurs</span>
            </div>
            <div class="flex items-center text-gray-dark text-2xl gap-3 py-3">
                <img src="assets/svg/categorie.svg" class="w-8">
                <span class="leading-[0px]">Catégorie</span>
            </div>
            <div class="flex items-center text-gray-dark text-2xl gap-3 py-3">
                <img src="assets/svg/theme.svg" class="w-8">
                <span class="leading-[0px]">Thème</span>
            </div>
        </div>
        <div class="absolute -right-6 top-[50%] py-[20px] pl-2 pr-1 leading-none text-3xl bg-white rounded-r-[30px] hover:cursor-pointer" id="openCrudSideBar">
            >
        </div>
    </nav>
</body>
<script src="assets/script/script.js"></script>
</html>