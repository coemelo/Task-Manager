<?php  require_once("Database/Database.php");

    class User{
        private $name;
        private $password;
        private $email;

        public function __construct(String $email, String $password){
            $this->setEmail($email);
            $this->setPassword($password);
        }


        public function login(PDO $pdo): bool{
            try{
                $userExists = Database::findByEmail($this->email, $pdo);

                $storedPassword = $this->getPassword();

                return ($userExists == true) && (password_verify($storedPassword, Database::getPassword($this->getEmail(), $pdo)));
                
            }catch(Exception $e){
                throw new Exception("error=all");

            }
        }

        public function getName(): String {
            return $this->name;
        }
        public function getPassword(): String {
            return $this->password;
        }
        public function getEmail(): String {
            return $this->email;
        }
        public function setName(String $name){
            $this->name = $name;
        }
        public function setPassword(String $password){
            $this->password = $password;
        }
        public function setEmail(String $email){
            $this->email = $email;
        }
    }
?>