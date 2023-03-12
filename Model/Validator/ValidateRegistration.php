<?php 
    function validateParams(String $name, String $email, String $password, String $confirmPassword): array{
        $errors = array();

        if(empty($name)): $errors[] = "namenull";
            elseif(mb_strlen($name) < 4 || mb_strlen($name) > 25): $errors[]  = "namelength";
        endif;

        if(empty($password)): $errors[] = "passwordnull";
            elseif(mb_strlen($password) < 7 || mb_strlen($password) > 100): $errors[]  = "passwordlength";
        endif;
        if(empty($confirmPassword)): $errors[] = "confirmpasswordnull";
            elseif($confirmPassword !== $password): $errors[] = "notmatchpassword"; 
        endif;

        if($email == ''): $errors[] = "emailnull"; 
            elseif(mb_strlen($email) < 11 || mb_strlen($email) > 70): $errors[] = "emaillength";
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)): $errors[] = "invalidemail"; 
        endif;

        return $errors;
    }
?>