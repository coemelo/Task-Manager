<?php
    function validateEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../../Public/index.php?invalidError=email");
        }
    }

    function validatePassword($password, $hash){
        if(!password_verify($password, $hash)){
            header("Location: ../../Public/index.php?invalidError=password");
        }
    }
?>