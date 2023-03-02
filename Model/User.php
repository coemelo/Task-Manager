<?php
    class User{
        private $name;
        private $email;
        private $password;
        private $id;

        public function __construct($name, $email, $password, $id)
        {
            $this->setName($name);
            $this->setEmail($email);
            $this->setId($id);
            $this->setPassword(password_hash($password, PASSWORD_BCRYPT));
        }

        public function getName(): String{
            return $this->name;
        }
        public function getEmail(): String{
            return $this->email;
        }
        public function getPassword(): String{
            return $this->password;
        }
        public function getId(): int{
            return $this->id;
        }
        
        public function setName($name){
            $this->name = $name;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setId($id){
            $this->id = $id;
        }
    }
?>