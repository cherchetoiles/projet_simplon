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
    <form action="?action=addCategoryTreat" method="POST" enctype="multipart/form-data">
    <label for="category_name">Category Name</label>
    <input type="text" id="category_name" name="category_name" required>

    <label for="category_logo">Category Logo</label>
    <input type="file" id="category_logo" name="category_logo" accept="image/*" required>

    <label for="category_description">Category Description</label>
    <textarea id="category_description" name="category_description" required></textarea>

    <label for="theme_id">Theme ID</label>
    <input type="number" id="theme_id" name="theme_id" required>

    <button type="submit">Submit</button>
    </form>
</body>
</html>