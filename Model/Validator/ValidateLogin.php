<?php
    function validateEmail(String $email){
        $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../../Public/index.php?invalidError=email");
        }
    }

    function validatePassword(String $password){
        filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($password == ''){
            header("Location: ../../Public/index.php?invalidError=password");
        }
    }
?>