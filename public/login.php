<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <label for="password">password</label>
        <input type="text" name="password" id="password">
        <input type="hidden" name="login">
        <input type="submit" value="invia">
    </form>
    <br>
    <p>non sei regitrato ? <a href="http://localhost/esercizio3/public/registrati.php">registrati</a></p>
</body>
</html>