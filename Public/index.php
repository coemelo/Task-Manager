<?php 
    $error = isset($_GET["error"]) ? $_GET["error"] : '';
?>

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
    <?php if($error == "connection"){ echo "<script>alert('Não foi possível conectar ao banco de dados');</script>"; } ?>

    <main>
        <img src="../Assets/Images/logo.png" class="logo">

        <p class="subtitle">Digite seus dados no campo abaixo.</p>

        <form action="../Controller/User/Login.php" method="post">
            <input type="email" name="email" id="email" class="input" placeholder="E-mail" required>
            <?php if($error == "emailnull"){ echo "<p class=error-message>Campo E-mail não pode estar vazio.</p>"; }
                  if($error == "email"){ echo "<p class=error-message>E-mail inválido.</p>"; }
            ?>
            <input type="password" name="password" id="password" class="input" placeholder="Senha" required>
            <?php if($error == "passwordnull"){ echo "<p class=error-message>Campo Senha não pode estar vazio.</p>"; } 
                  if($error == "password"){ echo "<p class=error-message>Senha inválida.</p>"; }
                  if($error == "all"){ echo "<p class=error-message>E-mail ou senha inválidos.</p>"; }
            ?>

            <a href="../Controller/ChangePassword.php" class="forgot-password">Esqueci minha senha</a>
            <a href="../Controller/Register.php" class="register">Cadastre-se</a>

            <button type="submit" class="submit">Acessar</button>
        </form>

    </main>
</body>
</html>