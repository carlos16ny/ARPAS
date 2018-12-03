<?php 

    class Room{

        private $id;
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn =  $db->connection();
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getRoomNumById($id){
            $query = 'SELECT room_num FROM room WHERE room.id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt;
        }

        public function getRoomById($id){
            $query = 'SELECT * FROM room WHERE room.id = :id';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt;
        }

        public function index(){

            $query = 'SELECT * FROM room WHERE 1';
            $stmt = $this->conn->prepare($query);

            try{
                $stmt->execute();
                return $stmt;
            }catch (PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }

        public function ocuparQuarto(){
            $query = 'UPDATE room SET status = 1 WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            try{
                $stmt->bindParam("id", $this->id);
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function vagarQuarto(){
            $query = 'UPDATE room SET status = 0 WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            try{
                $stmt->bindParam("id", $this->id);
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function limparQuarto(){
            $query = 'UPDATE room SET clean = 1 WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            try{
                $stmt->bindParam("id", $this->id);
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function sujarQuarto(){
            $query = 'UPDATE room SET clean = 0 WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            try{
                $stmt->bindParam("id", $this->id);
                $stmt->execute();
                return 1;
            }catch(PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }



    }


?>