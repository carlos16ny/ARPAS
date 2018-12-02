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
            $query = 'SELECT * FROM user WHERE email = :email ';
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

        public function updateName(){
            $query = "UPDATE user SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            try{
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function updateEmail(){
            $query = "UPDATE user SET email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":email", $this->email);
            try{
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function updateSenha(){
            $query = "UPDATE user SET password = :pass WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":pass", $this->pass);
            try{
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function updateFoto(){
            $query = "UPDATE user SET foto = :foto WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam("id", $this->id);
            $stmt->bindParam("foto", $this->foto);
            try{
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function getLogin(){
            $query = "SELECT * FROM user WHERE password = :pass AND email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":pass", $this->pass);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            return $stmt;
        }

        public function createUser(){
            $query = "INSERT INTO user (user, name, password, email, birthday, foto) VALUES ( :user, :nome, :pass, :email, :bday, :foto);";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":user", $this->user);
            $stmt->bindParam(":nome", $this->name);
            $stmt->bindParam(":pass", $this->pass);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":bday", $this->birthday);
            $stmt->bindParam(":foto", $this->foto);
            try{
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }


    }


?>