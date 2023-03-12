<?php session_start();
      session_regenerate_id();

      require_once("../../Model/Validator/ValidateLogin.php");
      require_once("../../Model/User.php");

    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        die(header("Location: ../../Public/error1020.php"));
    }

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    try{
        checkNullParams($email, $password);
        validateParams($email, $password);

        $login = new User($email, $password);

        $pdo = Database::connectPDO();

        if(! $login->login($pdo)){
            throw new Exception("error=all");
        }

        $location = "../../Private/TaskManager.php";
        $params = '';

    }catch(Exception $e){
        $location = "../../Public/index.php?";
        $params = $e->getMessage();

    }finally{
        
        $pdo = null;
        header("Location: ".$location.$params);
        
    }
?>