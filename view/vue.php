<!DOCTYPE html>
<html>
<head>
  <title>Primier Vue</title>
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
    .stroky {
        stroke: red;
    }
  </style>
</head>

<body class="font-body">
  <div class="container">
    <div class="content">
      <h2 class="text-6xl font-bold">Elève de simplon ?</h2>
      <p class="pt-3">Faites partie de nos <span class="font-bold">créateurs</span> et battez les records de vues pour partager ton savoir et obtenir des récompenses !</p>
      
        <div class="text-2xl flex mx-8 my-8">
            <div class=" w-1/2 p-8">
                <div class="pb-9">
                    <p class="font-bold">Dans quel formation es-tu ?</p>
                    <select id="dropdown1" name="dropdown1" class="ml-[120px] mt-3 text-lg p-2 block border border-indigo-600 border-slate-300 rounded-md">
                    <option class="stroky" value="1">Développeur Web et Web mobile</option>
                    </select>
                </div>
                <div>
                    <p class="font-bold">Souhaites-tu contribuer à nos cours ?</p>
                    <select id="dropdown2" name="dropdown2" class="ml-[120px] mt-3 text-lg p-2 block border border-indigo-600 border-slate-300  rounded-md">
                    <option value="1">Je souhaite posté des cours</option>
                    </select>
                </div>
            </div>
            <div class="w-1/2">
                 <img src="assets/vuu.png" alt="Photo" class="max-w-full h-auto">
            </div>
        </div>
    </div>
  </div>
</body>

</html>
