<?php session_start();
      session_regenerate_id();
      require_once("../../Model/Validator/ValidateLogin.php");
      require_once("../../Model/User.php");

    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        die("<p style='margin: 30px 20px; font-family: Arial; font-size: 80px';>403 | ACESSO NEGADO</p>");
    }

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    validateEmail($email);
    validatePassword($password);

    $login = new User($email, $password);

    $pdo = Database::connect();

    try{
        $login->login($pdo);
        
        header("Location: ../../Private/TaskManager.php");
    }catch(Exception $e){
        header("Location: ../../Public/error1020.php");

        die();
    }
    
?>