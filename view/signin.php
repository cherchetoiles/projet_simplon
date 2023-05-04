<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dist/output.css">
</head>
<body>
    <form method="POST" action="?action=signin_treat">
        email
        <input type="text" name="your_email" <?php if (isset($_COOKIE['simplon_name'])){echo "value='$_COOKIE[simplon_name]'";}?>>
        pass
        <input type="password" name="your_pass">
        remember me ? <input type="checkbox" name="remember_me">
        <input type="submit">
    </form>
</body>
</html>