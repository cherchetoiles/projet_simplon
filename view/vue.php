<!DOCTYPE html>
<html>
<head>
  <title>Premier Vue</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="dist/output.css" rel="stylesheet">
  <style>
    body {
      background-color: #EAEAEA;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 0 20px;
    }
    .content {
      background-color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
      padding: 40px;
      text-align: center;
      border-radius: 10px;
    }
   
  </style>
</head>

<body class="font-body">
  <div class="container mx-auto">
    <div class="content">
      <h2 class="text-4xl md:text-6xl md:pt-[30px] font-bold">Elève de simplon ?</h2>
      <p class="pt-3 text-sm md:text-base">Faites partie de nos <span class="font-bold">créateurs</span> et battez les records de vues pour partager ton savoir et obtenir des récompenses !</p>
      <form action="">
        <div class="text-2xl text-sm md:text-base text-left flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 p-8">
                <div class="pb-9">
                    <p class="font-bold text-sm md:text-base">Dans quel formation es-tu ?</p>
                    <select id="dropdown1" name="dropdown1" class="w-full md:w-96 ml-0 md:ml-[120px] mt-3 text-base md:text-lg p-2 block border border-indigo-600 border-slate-300 rounded-md">
                      <option class="" value="1">Développeur Web et Web mobile</option>
                    </select>
                </div>
                <div>
                    <p class="font-bold text-sm md:text-base">Souhaites-tu contribuer à nos cours ?</p>
                    <select id="dropdown2" name="dropdown2" class="w-full md:w-96 ml-0 md:ml-[120px] mt-3 text-base md:text-lg p-2 block border border-indigo-600 border-slate-300 rounded-md">
                      <option value="1">Je souhaite poster des cours</option>
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                 <img src="assets/vuu.png" alt="Photo" class="max-w-full h-auto">
            </div>
        </div>
        <div class="w-full flex justify-center">
                <button type="submit" class="p-3 text-white bg-red border rounded-md">Soumettre mon dossier</button>
        </div>
      </form>  
    </div>
  </div>
</body>
</html>
