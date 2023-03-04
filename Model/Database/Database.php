<?php class Database{
        public const DB_NAME = 'db_users';
        public const DB_USERNAME = 'root';
        public const DB_PASSWORD = '';
        public const DB_OPTIONS = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        public $pdo;


        public static function connect(): PDO{
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=". self::DB_NAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_OPTIONS);
                return $pdo;
            }
            catch(PDOException $pdoerr){
                echo "CONNECTION FAILED: " . $pdoerr->getMessage();
            }
        }

        public static function addUser(String $name, String $email, String $password, PDO $pdo): bool{

            if(self::findByEmail($email, $pdo)){
                throw new Exception("Email já existe.");
            }

            $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
            $stmt->execute();

            return true;

        }

        public static function findByEmail(String $email, PDO $pdo): bool{
            $query = "SELECT email FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                return true;
            }elseif($stmt->rowCount() == 0){
                return false;
            }
        }

        public static function verifyPassword(String $password, String $storedPassword, String $email, PDO $pdo): bool{
            $query = "SELECT password FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $password = $stmt->fetchColumn();
            
            if(! password_verify($storedPassword, $password)){
                throw new Exception("ERROR: Senha Inválida.");
                return false;
            }

            return true;
        }

        public static function closeConnection(PDO $pdo){
            $pdo = null;
        }
    }
?>