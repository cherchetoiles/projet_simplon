<!DOCTYPE html>
<html>
<head>
<title>Primier Vue</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
</style>
<link href="dist/output.css" rel="stylesheet">
</head>

<body class="font-family: 'Poppins', sans-serif;">
<div class="text-lg text-center pt-8">
    <h2 class="text-6xl">Elève de simplon ?</h2>
    <p>Faites partie des nos <span class="font-bold">créateurs</span> et battez les records de vues pour partager ton savoir et obtenir des récompenses !</p>
</div>
<br><br>

<div class="flex mx-8 my-8">  
  <div class="ml-8 w-1/2 p-8">
    <div>
      <p class="font-bold">Dans quel formation es-tu ?</p>
      <select id="dropdown1" name="dropdown1" class="ml-8 p-2 block rounded-md">
        <option value="1">Développeur Web et Web mobile</option>
      </select>
    </div>
    <div>
      <p class="font-bold">Souhaites-tu contribuer à nos cours ?</p>
      <select id="dropdown2" name="dropdown2" class="ml-8 p-2 block  rounded-md">
        <option value="">Je souhaite posté des cours</option>
      </select>
    </div>
  </div>

  <div class="w-1/2 p-4">
    <img src="assets/vuu.png" alt="Photo" class="max-w-full h-auto">
  </div>
</div>
</body>

</html>



