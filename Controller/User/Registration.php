<?php require_once("../../Model/Validator/ValidateRegistration.php"); 

  $name = isset($_POST["name"]) ? filter_var($_POST["name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
  $password = isset($_POST["password"]) ? filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
  $confirmPassword = isset($_POST["confirmpassword"]) ? filter_var($_POST["confirmpassword"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
  $email = isset($_POST["email"]) ? $_POST["email"] : '';

  $getErrors = validateParams($name, $email, $password, $confirmPassword);

  if(empty($getErrors)){
    require_once("../../Model/Database/Database.php");

    try{
      $pdo = Database::connectPDO();

      Database::addUser($name, $email, $password, $pdo);

      $value = "sucess=1";

    }catch(Exception $e){
      $value = $e->getMessage();

    }finally{
      global $value;
      $pdo = null;
      exit(header("Location: ../../Public/index.php?".$value));
    }
  }else{
    $values = array_values($getErrors);
    $url = "../../Public/Register.php?" . http_build_query($values);
    die(header("Location: $url"));
  }
?>