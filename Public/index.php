<?php $error = isset($_GET["error"]) ? $_GET["error"] : ''; 
      $sucess = isset($_GET["sucess"]) ? $_GET["sucess"] : '';
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
    <!-- Verify GET parameters and then alert a message. -->
    <?php switch($error){
            case "connection": echo "<script>alert('Não foi possível conectar ao banco de dados.');</script>";
                break;
            case "emailexists": echo "<script>alert('E-mail já existente.');</script>";
                break;
            default: break;
        }

        if(!empty($sucess)): echo "<script>alert('Cadastro concluído com sucesso.');</script>"; endif;
?>


    <main>
        <img src="../Assets/Images/logo.png" class="logo">

        <p class="subtitle">Digite seus dados no campo abaixo.</p>

        <form action="../Controller/User/Login.php" method="post">
            <input type="email" name="email" class="input" placeholder="E-mail" required>

            <?php if($error == "emailnull"): echo "<p class=error-message>Campo E-mail não pode estar vazio.</p>"; endif;
                  if($error == "email"): echo "<p class=error-message>E-mail inválido.</p>"; endif;
            ?>

            <input type="password" name="password" id="password" class="input" placeholder="Senha" required>

            <?php if($error == "passwordnull"): echo "<p class=error-message>Campo Senha não pode estar vazio.</p>"; endif;
                  if($error == "password"): echo "<p class=error-message>Senha inválida.</p>"; endif;
                  if($error == "all"): echo "<p class=error-message>Credenciais inválidas. Tente novamente.</p>"; endif;
            ?>

            <a href="../Controller/User/ChangePassword.php" class="forgot-password">Esqueci minha senha</a>
            <a href="Register.php" class="register">Cadastre-se</a>

            <button type="submit" class="submit">Acessar</button>
        </form>

    </main>
</body>
</html>