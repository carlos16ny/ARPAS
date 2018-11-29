<?php 

require_once 'classDatabase.php';

    class Hosted{

        // status:
        //     1 - Reservado
        //     2 - Pago
        //     3 - Cancelado

        private $id;
        private $id_guest;
        private $id_room;
        private $check_in;
        private $check_out;
        private $total;
        
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn =  $db->connection();
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setIdGuest($id_guest){
            $this->id_guest = $id_guest;
        }

        public function setIdRoom($id_room){
            $this->id_room = $id_room;
        }

        public function setCheckIn($check_in){
            $this->check_in = $check_in;
        }

        public function setCheckOut($check_out){
            $this->check_out = $check_out;
        }

        public function index_date(){

            $query = 'SELECT * FROM hosted WHERE `check_in` >= :date AND `check_out` <= :date2 ' ;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":date", date('Y-m-d', strtotime("yesterday")));
            $stmt->bindParam(":date2", date('Y-m-d', strtotime("+2 month")));

            try{
                $stmt->execute();
                return $stmt;
            }catch (PDOException $e){
                echo $e->getMessage();
                return null;
            }
        }

        public function getRoomId_Price($room_num){
            $query = 'SELECT room.id, room.price from room where room.room_num = :num';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":num", $room_num);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function getRoomsAvaliable($dateRange){
            $data = explode('-', $dateRange);
            return 0;
        }

        public function getRoomByDay($day){
            $query = 'SELECT room.id, room.room_num, room.price from room where room.id not in (SELECT hosted.room_id from hosted WHERE hosted.check_in = :date AND hosted.status != 3)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":date", $day);
            $stmt->execute();
            return $stmt;
        }

        public function reserveRoomByDay($day, $room_num, $user_id){
            $day = explode("/", $day);
            $d = $day[2].'/'.$day[1].'/'.$day[0];
            $query = 'INSERT INTO `hosted` VALUES (null, :id_user, :room_id, :check_in, :check_in, :price, 1)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_user", $user_id);
            $id_room = $this->getRoomId_Price($room_num)->id;
            $stmt->bindParam(":room_id", $id_room);
            $stmt->bindParam(":check_in", $d );
            $stmt->bindParam(":price", $this->getRoomId_Price($room_num)->price );
            try{
                $stmt->execute();
                return 1;
            }catch (PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function getHostByUser($user_id){
            $query = 'SELECT h.*, u.name, r.room_num FROM hosted as h, user as u, room as r WHERE h.user_id = :user_id AND h.room_id = r.id GROUP BY h.id ORDER BY h.check_in ASC' ;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
            return $stmt;
        }

        public function cancelarReserva($reg_id){
            $query = "UPDATE hosted SET status = 3 WHERE hosted.id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $reg_id);
            try{
                $stmt->execute();
                return 1;
            }catch (PDOException $e){
                echo $e->getMessage();
                return 0;
            }
        }

        public function getReservasByDate(){
            $id_user = $this->id_guest;
            $data = explode(' - ', $this->check_in);
            $data1 = explode('/', $data[0]);
            $data2 = explode('/', $data[1]);
            $data1 = $data1[2] . '/' . $data1[1] . '/' . $data1[0];
            $data2 = $data2[2] . '/' . $data2[1] . '/' . $data2[0];

            $query = 'SELECT h.*, u.name, r.room_num FROM hosted as h, user as u, room as r WHERE h.user_id = :user_id AND h.room_id = r.id AND h.check_in >= :data1 AND h.check_in <= :data2 GROUP BY h.id ORDER BY h.check_in ASC' ;
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":user_id", $id_user);
            $stmt->bindValue(":data1", $data1);
            $stmt->bindValue(":data2", $data2);
            $stmt->execute();
            return $stmt;
        }
    }

?>