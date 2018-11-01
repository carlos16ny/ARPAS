<?php 

    class User{

        private $id;
        private $name;
        private $user;
        private $pass;
        private $email;
        private $birthday;
        private $foto;
        
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn =  $db->connection();
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setUser($user){
            $this->user = $user;
        }

        public function setPass($pass){
            $this->pass = $pass;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setBirthday($date){
            $this->birthday = $date;
        }

        public function setFoto($foto){
            $this->foto = $foto;
        }

        public function index(){

            $query = 'SELECT * FROM user WHERE 1';
            $stmt = $this->conn->prepare($query);

            try{
                $stmt->execute();
                return $stmt;
            }catch (PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }

        public function getUserByEmail(){
            $query = 'SELECT * FROM user WHERE `email` = :email ';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $this->email);

            try{
                $stmt->execute();
                return $stmt;
            }catch (PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }


        public function createUserFromFacebook(){
            $this->pass = substr(md5(time()), 0, 6);
            $query = 'INSERT INTO `user` (`user`, `name`, `password`, `email`, `foto`) VALUES (:user, :nome, :pass, :email, :foto);';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":user", $this->user);
            $stmt->bindParam(":pass", $this->pass);
            $stmt->bindParam(":nome", $this->name);
            $stmt->bindParam(":foto", $this->foto);

            try{
                $stmt->execute();
                return $stmt;
            }catch (PDOException $e){
                var_dump($stmt);
                echo $e->getMessage();
                return null;
            }
        }


    }


?>