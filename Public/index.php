<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">
    <title>Log-in | Task Manager</title>
    <link rel="icon" href="../Assets//Icons/icon.png" type="image/x-icon">
</head>
<body>
    <main>
        <img src="../Assets/Icons/icon.png" class="logo">

        <p class="subtitle">Digite seus dados no campo abaixo.</p>

        <form action="../Controller/Login.php" method="post">
            <input type="email" name="email" id="email" class="input" placeholder="E-mail">
            <input type="password" name="password" id="password" class="input" placeholder="Senha">

            <a href="../Controller/ChangePassword.php" class="forgot-password">Esqueci minha senha</a>

            <button type="submit" class="submit">Acessar</button>
        </form>

    </main>
</body>
</html>