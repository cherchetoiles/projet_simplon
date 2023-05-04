<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="h-screen">
    <form method="POST" enctype="multipart/form-data" action="index.php?action=addThemeTreat">
        <input name="theme_name">
        <input type="file" accept="image/webp" name="theme_logo">
        <input type="submit">
    </form>
</body>
</html>