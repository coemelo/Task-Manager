<?php class Database{

        // Database Connection Parameters
        public const DB_NAME = 'db_users';
        public const DB_USERNAME = 'root';
        public const DB_PASSWORD = '';
        public const DB_OPTIONS = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        public $pdo;

        public static function connectPDO(): PDO{
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=". self::DB_NAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_OPTIONS);
                return $pdo;
            }
            catch(PDOException $pdoerr){
                throw new Exception("error=connection");
            }
        }

        public static function addUser(String $name, String $email, String $password, PDO $pdo): bool{

            if(self::findByEmail($email, $pdo)){    // If e-mail already exists throw "Email Alerady Exists"
                throw new Exception("error=emailexists");
            }

            // Query to add user to the database
            $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
            $stmt->execute();

            return true;

        }

        public static function findByEmail(String $email, PDO $pdo): bool{

            // Query to find email
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

        public static function getPassword(String $email, PDO $pdo): String{
            // Query to search the passowrd of the given email
            $query = "SELECT password FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchColumn(); //Return query;
        }

        public static function closeConnection(PDO $pdo){
            $pdo = null;
        }
    }
?>