<?php
    function checkNullParams(String $email, String $password): bool{
        if($email == ''){
            throw new Exception("error=emailnull");
        }
        if($password == ''){
            throw new Exception("error=passwordnull");
        }
        
        return true;
    }

    function validateParams(String $email, String $password): bool{

        //Filter Params

        $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //Validate Email

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("error=email");
            
        }

        return true;
    }
?>