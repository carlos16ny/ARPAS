<?php 

    class Admin{

        private $id;
        private $role;
        private $name;
        private $user;
        private $pass;
 
        
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

        public function setRole($role){
            $this->role = $role;
        }

        public function index(){

            $query = 'SELECT * FROM admin WHERE 1';
            $stmt = $this->conn->prepare($query);

            try{
                $stmt->execute();
                return $stmt;
            }catch (PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }
    }


?>