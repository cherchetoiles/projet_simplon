<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-green-600">
    <form method="POST" action='../index.php?action=signin_treat'>
        <input name="your_email">
        <input name="your_pass">
        <input type="checkbox" name="remember_me">
        <input type="submit">
    </form>
</body>
</html>