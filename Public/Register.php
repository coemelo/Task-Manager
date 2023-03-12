<?php $errors = array(); 
    $i = 0;
    while(isset($_GET[$i])){
        global $i;
        $errors[] = $_GET[$i];
        $i++;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">
    <title>Log-in | Task Manager</title>
</head>
<body>

    <main>
        <h2 class="title">Cadastre-se</h2>
        <form action="../Controller/User/Registration.php" method="post">
            <input type="text" name="name" class="input" placeholder="Seu Nome" minlength="4" maxlength="25" required>
            <?php  if(!empty($errors) && in_array("namenull", $errors)): echo "<p class='error-message'>Campo Nome não pode estar vazio.</p>"; 
                    elseif(!empty($errors) && in_array("namelength", $errors)): echo "<p class='error-message'>Campo Nome deve ter entre 4 e 25 caracteres</p>" ;
                endif;?>

            <input type="email" name="email" class="input" placeholder="Seu E-mail" minlength="11" maxlength="70" required>
            <?php if(!empty($errors) &&  in_array("emailnull", $errors)): echo "<p class='error-message'>Campo E-mail não pode estar vazio.</p>";
                    elseif(!empty($errors) && in_array("emaillength", $errors)): echo "<p class='error-message'>Campo E-mail deve ter entre 11 e 70 caracteres</p>" ;
                    elseif(!empty($errors) && in_array("invalidemail", $errors)): echo "<p class='error-message'>Campo E-mail inválido.</p>"; 
                endif;?>

            <input type="password" name="password" class="input" placeholder="Sua Senha" minlength="7" maxlength="100" required>
            <?php  if(!empty($errors) && in_array("passwordnull", $errors)): echo "<p class='error-message'>Campo E-mail não pode estar vazio.</p>"; 
                    elseif(!empty($errors) && in_array("passwordlength", $errors)): echo "<p class='error-message'>Campo Senha deve ser maior que 7 caracteres</p>" ;
                endif;?>

            <input type="password" name="confirmpassword" class="input" placeholder="Confirme Sua Senha" required>
            <?php if(!empty($errors) && in_array("confirmpasswordnull", $errors)): echo "<p class='error-message'>Campo Confirmar Senha não pode estar vazio.</p>";
                    elseif(!empty($errors) && in_array("notmatchpassword", $errors)): echo "<p class='error-message'>Senhas não conferem.</p>";
                  endif;?>

            <button type="submit" class="submit">Enviar</button>
        </form>
    </main>

</body>
</html>