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
<body class="bg-gray-bg h-full overflow-x-hidden">
    <div class="w-full flex overflow-hidden">
        <nav class="flex flex-col w-full left-0 z-10 -translate-x-full top-0 transition-transform fixed p-8 md:max-w-xs bg-white h-screen font-body" id="crudSideBarContent">
            <img src="assets/svg/logo.svg">
            <div class="mt-20 flex flex-col mx-auto text-xl">
                <div class="flex items-center text-gray-dark gap-3 py-3" id="dashboard">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8">
                        <path d="M7.875 6.75C7.875 7.37132 7.37132 7.875 6.75 7.875C6.12868 7.875 5.625 7.37132 5.625 6.75C5.625 6.12868 6.12868 5.625 6.75 5.625C7.37132 5.625 7.875 6.12868 7.875 6.75Z" fill="#858585"/>
                        <path d="M11.25 6.75C11.25 7.37132 10.7463 7.875 10.125 7.875C9.50368 7.875 9 7.37132 9 6.75C9 6.12868 9.50368 5.625 10.125 5.625C10.7463 5.625 11.25 6.12868 11.25 6.75Z" fill="#858585"/>
                        <path d="M14.625 6.75C14.625 7.37132 14.1213 7.875 13.5 7.875C12.8787 7.875 12.375 7.37132 12.375 6.75C12.375 6.12868 12.8787 5.625 13.5 5.625C14.1213 5.625 14.625 6.12868 14.625 6.75Z" fill="#858585"/>
                        <path d="M2.25 10.6875H24.75" stroke="#858585" stroke-linecap="round"/>
                        <path d="M10.125 23.625L10.125 11.25" stroke="#858585" stroke-linecap="round"/>
                        <path d="M2.25 13.5C2.25 8.1967 2.25 5.54505 3.89752 3.89752C5.54505 2.25 8.1967 2.25 13.5 2.25C18.8033 2.25 21.455 2.25 23.1025 3.89752C24.75 5.54505 24.75 8.1967 24.75 13.5C24.75 18.8033 24.75 21.455 23.1025 23.1025C21.455 24.75 18.8033 24.75 13.5 24.75C8.1967 24.75 5.54505 24.75 3.89752 23.1025C2.80207 22.007 2.43499 20.4676 2.31199 18" stroke="#858585" stroke-linecap="round"/>
                    </svg>
                    <span class="leading-[0px]">Tableau de bord</span>
                </div>
                <div class="flex items-center text-gray-dark bg-gray bg-opacity-10 gap-3 py-3" id="lesson">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8">
                        <path d="M14.7207 12.5L20.7577 14.1176" stroke="red" stroke-linecap="round"/>
                        <path d="M13.75 16.1221L17.3722 17.0927" stroke="red" stroke-linecap="round"/>
                        <path d="M25.3895 15.8091C24.6342 18.6279 24.2566 20.0374 23.4004 20.9515C22.7244 21.6732 21.8495 22.1783 20.8865 22.4029C20.7661 22.431 20.6439 22.4526 20.5187 22.468C19.3749 22.6091 17.9792 22.2351 15.4385 21.5543C12.6196 20.799 11.2102 20.4214 10.2961 19.5652C9.57432 18.8892 9.06922 18.0144 8.84466 17.0513C8.56026 15.8316 8.93792 14.4221 9.69323 11.6033L10.3403 9.18847C10.4489 8.78307 10.5497 8.40683 10.6453 8.05702C11.2141 5.97447 11.5964 4.82873 12.3294 4.04608C13.0054 3.32432 13.8803 2.81922 14.8433 2.59466C16.063 2.31026 17.4725 2.68792 20.2913 3.44323C23.1102 4.19853 24.5196 4.57619 25.4337 5.43234C26.1555 6.10835 26.6606 6.98321 26.8851 7.94628C27.0863 8.80885 26.9563 9.7663 26.5958 11.25" stroke="red" stroke-linecap="round"/>
                        <path d="M4.09027 20.8087C4.84558 23.6276 5.22324 25.037 6.07939 25.9511C6.7554 26.6729 7.63026 27.178 8.59333 27.4025C9.81305 27.6869 11.2225 27.3093 14.0413 26.554C16.8602 25.7986 18.2696 25.421 19.1837 24.5648C19.7999 23.9877 20.2581 23.2657 20.5187 22.4676M10.6453 8.05664C10.2046 8.17058 9.72176 8.29995 9.18847 8.44285C6.36962 9.19816 4.96019 9.57581 4.04608 10.432C3.32432 11.108 2.81922 11.9828 2.59466 12.9459C2.39352 13.8085 2.52354 14.7661 2.8841 16.25" stroke="red" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="leading-[0px]">Cours</span>
                </div>
                <div class="flex items-center text-gray-dark gap-3 py-3" id="user">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8">
                        <circle cx="9" cy="6" r="4" stroke="#858585"/>
                        <path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="#858585" stroke-linecap="round"/>
                        <path d="M5.88915 20.5843C6.82627 20.8504 7.88256 21 9 21C12.866 21 16 19.2091 16 17C16 14.7909 12.866 13 9 13C5.13401 13 2 14.7909 2 17C2 17.3453 2.07657 17.6804 2.22053 18" stroke="#858585" stroke-linecap="round"/>
                        <path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="#858585" stroke-linecap="round"/>
                    </svg>
                    <span class="leading-[0px]">Utilisateurs</span>
                </div>
                <div class="flex items-center text-gray-dark gap-3 py-3" id="category">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8">
                        <path d="M27.5 14.7474C27.5 11.4569 27.5 9.81169 26.5382 8.74229C26.4497 8.64392 26.3561 8.5503 26.2577 8.46183C25.1883 7.5 23.5431 7.5 20.2526 7.5H19.7855C18.3434 7.5 17.6224 7.5 16.9504 7.30847C16.5813 7.20326 16.2255 7.05589 15.8901 6.86928C15.2796 6.52959 14.7697 6.01972 13.75 5L13.0622 4.31218C12.7204 3.97041 12.5495 3.79952 12.3699 3.65064C11.5957 3.00879 10.6458 2.61536 9.64446 2.52172C9.4122 2.5 9.17053 2.5 8.68718 2.5C7.58402 2.5 7.03244 2.5 6.57298 2.58669C4.55039 2.9683 2.9683 4.55039 2.58669 6.57298C2.5 7.03244 2.5 7.58402 2.5 8.68718M27.4891 20C27.4443 23.0995 27.2144 24.8567 26.0355 26.0355C24.5711 27.5 22.214 27.5 17.5 27.5H12.5C7.78595 27.5 5.42893 27.5 3.96447 26.0355C2.5 24.5711 2.5 22.214 2.5 17.5V13.75" stroke="#858585" stroke-linecap="round"/>
                        <path d="M12.5 16.875L14.1667 18.75L17.5 15" stroke="#858585" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="leading-[0px]">Catégorie</span>
                </div>
                <div class="flex items-center text-gray-dark gap-3 py-3" id="theme">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="15" cy="20" r="3.75" stroke="#858585"/>
                        <path d="M15 24.075L12.1714 26.7868C11.7663 27.1752 11.5638 27.3694 11.3923 27.4366C11.0014 27.5897 10.5678 27.4586 10.3622 27.1253C10.272 26.9789 10.2439 26.7151 10.1876 26.1873C10.1559 25.8893 10.14 25.7403 10.0918 25.6155C9.98393 25.3361 9.75724 25.1188 9.46583 25.0153C9.33566 24.9691 9.18024 24.9539 8.86942 24.9235C8.3189 24.8696 8.04364 24.8426 7.89104 24.7561C7.54329 24.559 7.40661 24.1433 7.56632 23.7686C7.63641 23.6042 7.83895 23.41 8.24404 23.0216L10.0918 21.2501L11.3923 19.9497" stroke="#858585"/>
                        <path d="M15 24.0749L17.8286 26.7867C18.2337 27.175 18.4362 27.3692 18.6077 27.4364C18.9986 27.5895 19.4322 27.4585 19.6378 27.1251C19.728 26.9788 19.7561 26.7149 19.8124 26.1871C19.8441 25.8891 19.86 25.7401 19.9082 25.6153C20.0161 25.3359 20.2428 25.1186 20.5342 25.0152C20.6643 24.969 20.8198 24.9538 21.1306 24.9233C21.6811 24.8694 21.9564 24.8425 22.109 24.756C22.4567 24.5588 22.5934 24.1432 22.4337 23.7684C22.3636 23.604 22.161 23.4098 21.756 23.0215L19.9082 21.25L18.75 20.0918" stroke="#858585"/>
                        <path d="M21.6496 22.4947C24.1151 22.4685 25.4893 22.314 26.4017 21.4016C27.5 20.3033 27.5 18.5355 27.5 15V11.25M8.75 22.4978C6.03122 22.4827 4.55883 22.3621 3.59835 21.4016C2.5 20.3033 2.5 18.5355 2.5 15L2.5 10C2.5 6.46447 2.5 4.6967 3.59835 3.59835C4.6967 2.5 6.46447 2.5 10 2.5L20 2.5C23.5355 2.5 25.3033 2.5 26.4017 3.59835C27.014 4.21071 27.285 5.03114 27.4049 6.25" stroke="#858585" stroke-linecap="round"/>
                        <path d="M11.25 7.5L18.75 7.5" stroke="#858585" stroke-linecap="round"/>
                        <path d="M8.75 11.875H11.25M21.25 11.875H15.625" stroke="#858585" stroke-linecap="round"/>
                    </svg>
                    <span class="leading-[0px]">Thème</span>
                </div>
            </div>
            <div class="absolute z-10 max-md:-right-6 -right-6 top-[50%] py-[20px] pl-2 pr-1 leading-none text-3xl bg-white rounded-r-[30px] hover:cursor-pointer text-red" id="openCrudSideBar">
                >
            </div>
        </nav>
        <div class="inline-block h-screen" id="hiddenBlockElt">
        </div>
        <div class="relative z-0 transition-all flex flex-col items-center font-body grow lg:ml-5" id="mainCrudContent">
            <div class="w-full">
                <div class="flex flex-col text-red mx-auto lg:mx-0 items-center gap-2">
                    <span class="lg:flex lg:justify-end lg:w-full">
                        Retour à la page d'accueil >
                    </span>
                    <div class="flex text-4xl text-black font-semibold items-center w-fit gap-2 lg:w-full lg:justify-start">
                        <svg width="40" height="40" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.7207 12.5L20.7577 14.1176" stroke="red" stroke-linecap="round"/>
                            <path d="M13.75 16.1221L17.3722 17.0927" stroke="red" stroke-linecap="round"/>
                            <path d="M25.3895 15.8091C24.6342 18.6279 24.2566 20.0374 23.4004 20.9515C22.7244 21.6732 21.8495 22.1783 20.8865 22.4029C20.7661 22.431 20.6439 22.4526 20.5187 22.468C19.3749 22.6091 17.9792 22.2351 15.4385 21.5543C12.6196 20.799 11.2102 20.4214 10.2961 19.5652C9.57432 18.8892 9.06922 18.0144 8.84466 17.0513C8.56026 15.8316 8.93792 14.4221 9.69323 11.6033L10.3403 9.18847C10.4489 8.78307 10.5497 8.40683 10.6453 8.05702C11.2141 5.97447 11.5964 4.82873 12.3294 4.04608C13.0054 3.32432 13.8803 2.81922 14.8433 2.59466C16.063 2.31026 17.4725 2.68792 20.2913 3.44323C23.1102 4.19853 24.5196 4.57619 25.4337 5.43234C26.1555 6.10835 26.6606 6.98321 26.8851 7.94628C27.0863 8.80885 26.9563 9.7663 26.5958 11.25" stroke="black" stroke-linecap="round"/>
                            <path d="M4.09027 20.8087C4.84558 23.6276 5.22324 25.037 6.07939 25.9511C6.7554 26.6729 7.63026 27.178 8.59333 27.4025C9.81305 27.6869 11.2225 27.3093 14.0413 26.554C16.8602 25.7986 18.2696 25.421 19.1837 24.5648C19.7999 23.9877 20.2581 23.2657 20.5187 22.4676M10.6453 8.05664C10.2046 8.17058 9.72176 8.29995 9.18847 8.44285C6.36962 9.19816 4.96019 9.57581 4.04608 10.432C3.32432 11.108 2.81922 11.9828 2.59466 12.9459C2.39352 13.8085 2.52354 14.7661 2.8841 16.25" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="leading-none">
                            Cours
                        </div>
                    </div>
                </div> 
                <div class="flex flex-col items-center mt-5 lg:flex-row lg:justify-between lg:mx-5">
                    <div class="lg:flex lg:gap-2">
                        <div class="relative">
                            <input type="text" class="rounded-lg bg-white pl-6 py-3 w-[260px] inline-block" placeholder="Rechercher un article">
                            <img src="assets/svg/searchbar-icon.svg" class="absolute right-5 top-3">
                        </div>
                        <label class="relative w-full">
                            <select class="mt-5 py-3 rounded-lg pl-6 w-full lg:mt-0 lg:pr-10">
                                <option>Le plus récent</option>
                            </select>
                            <div class="absolute right-px p-2 top-[-2px] bg-white lg:top-4">
                            </div>
                            <div class="absolute right-1 p-4 top-[-10px] lg:top-[3px] lg:-right-2">
                                <svg width="19" height="10" viewBox="0 0 19 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 1L9.5 9L1 1" stroke="#F01E29" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </label>
                    </div>
                    <button class="bg-red text-white py-2 px-6 rounded-lg mt-5 inline-block font-semibold text-lg lg:mt-0 lg:whitespace-nowrap">
                        Ajouter un cours
                    </button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 mt-5 gap-5" id="mainContent">
                <!-- card -->
                <div class="rounded-lg bg-white p-6 flex flex-col items-center gap-10">
                    <div class="flex flex-col items-center">
                        <span class="text-lg">
                            1
                        </span>
                        <img src="assets/img/lesson_minature/minia_test.webp">
                    </div>
                    <div>
                        <span class="font-semibold text-xl">Les bases de l'HTML</span>
                        <div class="flex items-center gap-2">
                            <img src="assets/img/user_avatar/avatar_test.jpg" class="rounded-full w-12">
                            <span class="leading-none text-lg">Louis Gueret</span>
                        </div>
                        <div class="flex mt-4 justify-evenly ">
                            <div class="flex gap-1 items-center">
                                <img src="assets/svg/eye_icon.svg">
                                <span class="italic leading-none">360K</span>
                            </div>
                            <div class="flex gap-1 items-center">
                                <img src="assets/svg/heart_icon.svg">
                                <span class="italic leading-none">120K</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center w-full gap-3">
                        <div class="flex justify-evenly w-full text-lg">
                            <span class="text-blue">HTML</span>
                            <span class="italic">Niveau 1</span>
                        </div>
                        <span>05/04/2023</span>
                        <div class="flex w-full justify-center gap-4">
                            <img src="assets/svg/edit_icon.svg">
                            <img src="assets/svg/trash_icon.svg">
                        </div>
                    </div>
                </div>
                <!-- fin -->
            </div>
        </div>
    </div>
</body>
<script src="assets/script/script.js"></script>
</html>