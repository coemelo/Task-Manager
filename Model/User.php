<?php  require_once("Database/Database.php");

    class User{
        private $name;
        private $password;
        private $email;

        public function __construct(String $email, String $password){
            $this->setEmail($email);
            $this->setPassword($password);
        }


        /* A função a seguir trata-se de uma forma de verificar o login do usuário sem
        deixar que o cracker saiba, através do tempo de resposta, se o usuário existe ou não
        no banco de dados. */
        public function login(PDO $pdo): bool{
            $userExists = Database::findByEmail($this->email, $pdo);
            
            $storedPassword = ($userExists == false) ? $this->generateFakePassword() : $this->getPassword();
            //Se o usuário não for encontrado, gerará um password fake

            try{
                return ($userExists !== null) && (Database::verifyPassword($this->password, $storedPassword, $this->email, $pdo));
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                return false;
            }
            /* Estando o usuário ou não no banco de dados, a verificação acontecerá da mesma maneira
             caso o usuário existisse, o que torna o tempo de resposta identicos em ambos os casos
            */
        }

        public function generateFakePassword(): String{
            $bytes = random_bytes(16);
            $hash = bin2hex($bytes);
            return $fake = password_hash($hash, PASSWORD_BCRYPT);
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