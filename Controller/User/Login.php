<?php session_start();
      require_once("../../Model/Validate/ValidateLogin.php");

    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        die("<p style='margin: 30px 20px; font-family: Arial; font-size: 80px';>403 | ACESSO NEGADO</p>");
    }

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if(!empty($email)){

        validateEmail($email);

    }else{
        header("Location: ../../Public/index.php?nullError=email");
    }

    if(!empty($password)){

        validatePassword($email, '1123'); //handle later

    }else{
        header("Location: ../../Public/index.php?nullError=password");
    }
?>